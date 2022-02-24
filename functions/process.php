<?php
include_once 'MailChimp.php';
 
if (isset($_POST['Submit'])) {
        if (empty($_POST['name']) || empty($_POST['email'])) {
                echo 'Please enter a name and email address.';
        } else {
                $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                /*
                 * Place here your validation and other code you're using to process your contact form.
                 * For example: mail('your@mail.com', 'Subject: contact form', $_POST['message']);
                 * Don't forget to validate all your form input fields!
                 */
                if (!empty($_POST['newsletter'])) {
                        $mc = new DrewmMailChimp('391b6f6db8a1165f12baf55cb7e766e8-us5');
                        $mvars = array('optin_ip'=> $_SERVER['REMOTE_ADDR'], 'FNAME' => $name, 'MMERGE3' => 'VALUE_FOR_OPT_MERGEFIELD');
                        $result = $mc->call('lists/subscribe', array(
                                        'id'                => '01db3626e5',
                                        'email'             => array('email'=>$email),
                                        'merge_vars'        => $mvars,
                                        'double_optin'      => true,
                                        'update_existing'   => false,
                                        'replace_interests' => false,
                                        'send_welcome'      => false
                                )
                        );
                        if (!empty($result['euid'])) {
                                echo 'Thanks, please check your mailbox and confirm the subscription.';
                        } else {
                                if (isset($result['status'])) {
                                        switch ($result['code']) {
                                                case 214:
                                                echo 'You are already a member of this list.';
                                                break;
                                                // check the MailChimp API docs for more codes
                                                default:
                                                echo 'An unknown error occurred.';
                                                break;
                                        }
                                }
                        }
                }
                }
}
?>