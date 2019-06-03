<?php

class SEM extends Controller
{

    public function home($f3)
    {
        $db = $this->db;
        new DB\SQL\Session($db);
        $f3->set('content', 'home.htm');
        $f3->set('page_title', 'AAI Logistics SEM');
        if ($f3->get('SESSION.user') !== null) {
            $f3->set('user_login', true);
        }
        echo \Template::instance()->render('layout.htm');
    }

    public function fetchOrders()
    {
        $db = $this->db;
        echo json_encode(array('data' => $db->exec('SELECT *, DATE_FORMAT(date, "%d/%m/%Y %H:%m:%s") as date, DATE_FORMAT(date_edited, "%d/%m/%Y %H:%m:%s") as date_edited FROM sem')));
    }

    public function register($f3)
    {
        $db = $this->db;
        $data = array();
        $error = array();
        $have_request = $have_type = $have_category = false;
        $types = array('regular' => '', 'emergency' => '', 'budgeted' => '', 'unbudgeted' => '');
        $categories = array('Travel' => '', 'Furn/Eqpt/Fixt' => '', 'Insurance' => '', 'Preventive_Maintenance' => '', 'Repair' => '', 'Software_Licenses' => '', 'Supplies/Materials' => '', 'Uniform/PPE' => '', 'Others' => '');
        if (new DateTime($f3->get('POST.date_needed')) < new DateTime()) {
            array_push($error, 'Date needed cannot be earlier than current date');
        }

        foreach ($types as $type => $value) {
            $types[$type] = $f3->get('POST.' . $type);
            if ($types[$type] == 1) {
                $have_type = true;
            }
        }

        if (!$have_type) {
            array_push($error, 'Must select at least one type');
        }

        foreach ($categories as $category => $value) {
            $categories[$category] = $f3->get('POST.' . $category);
            if ($categories[$category] == 1) {
                $have_category = true;
            }
        }

        if (!$have_category) {
            array_push($error, 'Must select at least one category');
        }

        foreach ($f3->get('POST.quantity') as $quantity) {
            if (!empty($quantity)) {
                $have_request = true;
            }
        }

        if (!$have_request) {
            array_push($error, 'Must have at least one request');
        }

        if ($f3->get('POST.Others') == 1 && empty($f3->get('POST.others_custom'))) {
            array_push($error, 'Please specify category if using the others category');
        }

        if (!empty($error)) {
            $data['success'] = '';
            $data['error'] = $error;
        } else {
            $db->exec(
                'INSERT INTO sem (name, date_needed, department, status) VALUES (?, ?, ?, ?);',
                array(
                    1 => $f3->get('POST.name'),
                    2 => $f3->get('POST.date_needed'),
                    3 => $f3->get('POST.department'),
                    4 => 'Pending',
                )
            );

            $sem_id = $db->lastInsertId();

            foreach ($types as $type => $type_value) {
                $db->exec('INSERT INTO sem_type (type_name, value, sem_id) VALUES (?, ? ,?)', array(1 => $type, 2 => $type_value, 3 => $sem_id));
            }

            foreach ($categories as $category => $category_value) {
                if ($category == 'Others' && $category_value == 1) {
                    $category = $f3->get('POST.others_custom');
                }
                $db->exec('INSERT INTO sem_category (category_name, value, sem_id) VALUES (?, ? ,?)', array(1 => $category, 2 => $category_value, 3 => $sem_id));
            }

            for ($index = 0; $index < count($f3->get('POST.quantity')); $index++) {
                $db->exec(
                    'INSERT INTO sem_request (sem_id, quantity_with_oum, description, remarks_or_purpose) VALUES (?, ?, ?, ?)',
                    array(
                        1 => $sem_id,
                        2 => $f3->get("POST.quantity[$index]"),
                        3 => $f3->get("POST.description[$index]"),
                        4 => $f3->get("POST.remarks_purpose[$index]"),
                    )
                );
            }

            $data['success'] = 'Successfully registered';
        }

        echo json_encode($data);
    }

    public function fetchOrder($f3, $params)
    {
        $db = $this->db;

        $order = $db->exec('SELECT *, DATE_FORMAT(date, "%d/%m/%Y %H:%m:%s") as date, DATE_FORMAT(date_edited, "%d/%m/%Y %H:%m:%s") as date_edited, DATE_FORMAT(date_needed, "%d/%m/%Y %H:%m:%s") as date_needed FROM sem WHERE id = ?', array(1 => $params['id']));

        if ($f3->get('SESSION.user') !== null) {
            $f3->set('user_login', true);
        }

        if (count($order) == 1) {
            $f3->set('basic_info', $order);
            $f3->set('categories_selected', $db->exec('SELECT * FROM sem_category WHERE sem_id = ?', array(1 => $params['id'])));
            $f3->set('types_selected', $db->exec('SELECT * FROM sem_type WHERE sem_id = ?', array(1 => $params['id'])));
            $f3->set('requests', $db->exec('SELECT * FROM sem_request WHERE sem_id = ?', array(1 => $params['id'])));
            echo \Template::instance()->render('order.htm');
        } else {
            $f3->set('looking', 'Content');
            echo \Template::instance()->render('error.htm');
        }
    }

    public function renderLogin($f3)
    {
        $f3->set('routeback', $f3->get('SESSION.routeback'));
        echo \Template::instance()->render('login.htm');
    }

    public function login($f3)
    {
        $db = $this->db;
        $error = array();
        $data = array();
        $user = $db->exec('SELECT * FROM user WHERE username = ?', array(1 => $f3->get('POST.username')));
        if (count($user) != 1) {
            array_push($error, 'username');
        } else {
            if (!password_verify($f3->get('POST.password'), $user[0]['password'])) {
                array_push($error, 'password');
            }
        }

        if (!empty($error)) {
            $data['error'] = $error;
            $data['success'] = '';
        } else {
            new DB\SQL\Session($db);
            $f3->set('SESSION.user', $f3->get('POST.username'));

            $data['success'] = 'Logged in successfully';
        }

        echo json_encode($data);
    }

    public function renderPDF($f3, $params)
    {
        $db = $this->db;
        $pdf = new Dompdf\Dompdf();
        $order = $db->exec('SELECT *, DATE_FORMAT(date, "%d/%m/%Y %H:%m:%s") as date, DATE_FORMAT(date_edited, "%d/%m/%Y %H:%m:%s") as date_edited, DATE_FORMAT(date_needed, "%d/%m/%Y %H:%m:%s") as date_needed FROM sem WHERE id = ?', array(1 => $params['id']));
        if (count($order) == 1) {
            $BASE = $f3->get('BASE');
            $basic_info = $order;
            $categories_selected = $db->exec('SELECT * FROM sem_category WHERE sem_id = ?', array(1 => $params['id']));
            $types_selected = $db->exec('SELECT * FROM sem_type WHERE sem_id = ?', array(1 => $params['id']));
            $requests = $db->exec('SELECT * FROM sem_request WHERE sem_id = ?', array(1 => $params['id']));
        } else {
            $f3-error(404);
        }
        ob_start();
        include 'app/order_template.php';
        $html = ob_get_clean();
        ob_end_clean();

        $pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $pdf->render();

        // Output the generated PDF to Browser
        $pdf->stream('File', array('Attachment' => 0));
    }

    public function renderEditOrder($f3, $params)
    {
        if ($f3->get('SESSION.user') !== null) {
            $f3->set('user_login', true);
        }
        $db = $this->db;
        $f3->set('action', $f3->get('PARAMS.0'));
        $f3->set('basic_info', $db->exec('SELECT *, DATE_FORMAT(date_needed,"%Y-%m-%d") as formatted_date_needed FROM sem WHERE id = ?', array(1 => $params['id'])));
        $f3->set('types', $db->exec('SELECT * FROM sem_type WHERE sem_id = ?', array(1 => $params['id'])));
        $f3->set('categories', $db->exec('SELECT * FROM sem_category WHERE sem_id = ?', array(1 => $params['id'])));
        $f3->set('requests', $db->exec('SELECT * FROM sem_request WHERE sem_id = ?', array(1 => $params['id'])));
        echo \Template::instance()->render('edit.htm');
    }

    public function editOrder($f3, $params)
    {
        $db = $this->db;
        $types = array('regular' => '', 'emergency' => '', 'budgeted' => '', 'unbudgeted' => '');
        $categories = array('Travel' => '', 'Furn/Eqpt/Fixt' => '', 'Insurance' => '', 'Preventive_Maintenance' => '', 'Repair' => '', 'Software_Licenses' => '', 'Supplies/Materials' => '', 'Uniform/PPE' => '', 'Others' => '');

        $sem_id = $params['id'];

        foreach ($types as $type => $value) {
            $types[$type] = $f3->get('POST.' . $type);
        }
        foreach ($categories as $category => $value) {
            $categories[$category] = $f3->get('POST.' . $category);
        }

        $db->exec(
            'UPDATE sem SET name = ?, date_needed = ?, department = ?, status = ?, purchase_order = ?, purchase_received = ?, date_edited = CURRENT_TIMESTAMP WHERE id = ?',
            array(
                1 => $f3->get('POST.name'),
                2 => $f3->get('POST.date_needed'),
                3 => $f3->get('POST.department'),
                4 => $f3->get('POST.status'),
                5 => $f3->get('POST.purchase_order'),
                6 => $f3->get('POST.purchase_received'),
                7 => $sem_id,
            )
        );

        foreach ($types as $type => $type_value) {
            $db->exec(
                'UPDATE sem_type SET value = ? WHERE type_name = ? AND sem_id = ?',
                array(
                    1 => $type_value,
                    2 => $type,
                    3 => $sem_id
                )
            );
        }

        foreach ($categories as $category => $category_value) {
            if ($category == 'Others' && $category_value == 1) {
                $category = $f3->get('POST.others_custom');
                $db->exec(
                    'UPDATE sem_category SET value = ?, category_name = ? WHERE category_name = ? AND sem_id = ?',
                    array(
                        1 => $category_value,
                        2 => $category,
                        3 => $f3->get('POST.others_custom_old'),
                        4 => $sem_id
                    )
                );
            } else {
                $db->exec(
                    'UPDATE sem_category SET value = ? WHERE category_name = ? AND sem_id = ?',
                    array(
                        1 => $category_value,
                        2 => $category,
                        3 => $sem_id
                    )
                );
            }
        }

        $db->exec('DELETE FROM sem_request WHERE sem_id = ?', array(1 => $sem_id));
        for ($index = 0; $index < count($f3->get('POST.quantity')); $index++) {
            $db->exec(
                'INSERT INTO sem_request (sem_id, quantity_with_oum, description, remarks_or_purpose) VALUES (?, ?, ?, ?)',
                array(
                    1 => $sem_id,
                    2 => $f3->get("POST.quantity[$index]"),
                    3 => $f3->get("POST.description[$index]"),
                    4 => $f3->get("POST.remarks_purpose[$index]"),
                )
            );
        }

        echo json_encode('success');
    }
}
