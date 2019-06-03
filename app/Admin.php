<?php
class Admin extends Controller
{

    public function beforeroute($f3)
    {
        $db = $this->db;
        new DB\SQL\Session($db);
        if (null === $f3->get('SESSION.user')) {
            $f3->set('SESSION.routeback', $f3->get('PARAMS.0'));
            $f3->reroute('/login/');
        }
    }

    public function renderAddOrderAction($f3, $params)
    {
        $db = $this->db;
        if ($params['action'] == 'purchase_received') {
            $f3->set('field_name', $params['action']);
            $f3->set('field_formal_name', 'Purchase Received');
        } else if ($params['action'] == 'purchase_order') {
            $f3->set('field_name', $params['action']);
            $f3->set('field_formal_name', 'Purchase Order');
        } else if ($params['action'] == 'file_upload') {
            $f3->set('field_name', $params['action']);
            $f3->set('field_formal_name', 'Upload File');
        } else {
            $f3->error(404);
        }
        $f3->set('action', $f3->get('PARAMS.0'));
        $f3->set('field_values', $db->exec('SELECT * FROM sem WHERE id = ?', array(1 => $params['id'])));
        echo \Template::instance()->render('add.htm');
    }

    public function addOrderAction($f3, $params)
    {
        $db = $this->db;
        $message = 'Successfully added';
        foreach ($f3->get('POST') as $field => $field_value) {
            if ($field == 'purchase_received') {
                $db->exec('UPDATE sem SET purchase_received = ? WHERE id = ?', array(1 => $field_value, 2 => $params['id']));
            }
            if ($field == 'purchase_order') {
                if ($field_value != '') {
                    $db->exec('UPDATE sem SET purchase_order = ?, status = "Complete" WHERE id = ?', array(1 => $field_value, 2 => $params['id']));
                } else {
                    $db->exec('UPDATE sem SET purchase_order = ? status = "Pending" WHERE id = ?', array(1 => $field_value, 2 => $params['id']));
                }
            }
        }

        if ($f3->get('FILES') !== null) {
            $overwrite = true;
            $web = \Web::instance();
            $web->acceptable('application/pdf');

            $files = $web->receive(function ($file, $formFieldName) {
                $extensions = array('application/pdf');
                $mime = $file['type'];
                if ($file['size'] > (10 * 1024 * 1024)) {
                    return false;
                }

                if (!in_array($mime, $extensions)) {
                    return false;
                }
                return true;
            },
                $overwrite,
                function ($base, $name) {
                    $f3=Base::instance();
                    $ext = substr($base, strrpos($base, '.'));
                    $new_name = $f3->get('PARAMS.id') . '_file' . $ext;
                    return $new_name;
                }
            );
            foreach ($files as $file => $uploaded) {
                if ($uploaded == true) {
                    $db->exec('UPDATE sem SET file_upload = ? WHERE id = ?', array(1 => $file, 2 => $params['id']));
                } else {
                    $message = 'Invalid file';
                    // var_dump($uploaded);
                    // foreach ($uploaded as $file_messages_index => $file_messages) {
                    //     $message .= $file_messages . '<br>';
                    // }
                }
            }
        }
        echo json_encode($message);
    }

    public function logout($f3)
    {
        $f3->clear('SESSION');
        $f3->reroute('/');
    }
}
