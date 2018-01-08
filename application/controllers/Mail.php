<?php

class Mail extends Public_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('email_helper');
        $this->email->set_newline("\r\n");
        $this->load->helper('form');
        $this->load->model('admin_model');
    }

    function common($emailer)
    {
        $css = file_get_contents(FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'emailer.css');
        $emogrifier = new \Pelago\Emogrifier();
        $emogrifier->setHtml($emailer);
        $emogrifier->setCss($css);
        return $emogrifier->emogrify();
    }

    function check_captcha($str)
    {

        $word = $this->session->userdata('captchaWord');
        if (strcmp(strtoupper($str), strtoupper($word)) == 0) {
            return true;
        } else {
            $this->form_validation->set_message('check_captcha', 'Please enter  correct captcha words!');
            return false;
        }
    }

    function unlink_captcha()
    {
        $time = $this->session->userdata('captchaTime');
        $url = 'uploads/captcha/' . $time . '.jpg';
        if (file_exists($url)) {
            unlink($url);
        }
    }

    function message_us()
    {
        $post = $this->input->post();
        if ($post) {
            $this->form_validation->set_rules('full_name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone Number', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//            $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
//            $this->unlink_captcha();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('contact#messageus');
            }
            $this->email->from(FROM_EMAIL);
            $this->email->to(EMAIL_TO_ADMIN);
            $sub = "Client Contact Information";
            $this->email->subject($sub);
            $emailer = $this->load->view('emailer/contact', array('data' => $post), true);
            $mergedHtml = $this->common($emailer);
            $this->email->message($mergedHtml);

            if ($this->email->send()) {
                $this->session->set_flashdata('msg', 'Thank you!, your contact request has been received. We will get back to you shortly.');
                redirect('contact');
            }
            show_error($this->email->print_debugger());
        } else {
            $this->session->set_flashdata('dmsg', 'WARNING! Invalid Page call.');
            redirect('contact');
        }
    }

    function forgot_email()
    {
        $post = $this->input->post();
        if ($post && $post['email'] == EMAIL_TO_ADMIN) {
            $data = $this->admin_model->get();
            $this->email->from(FROM_EMAIL);
            $this->email->to(EMAIL_TO_ADMIN);
            $this->email->subject("Forget Password");
            $emailer = $this->load->view('emailer/forgot_login', array('data' => $data), true);
            $mergedHtml = $this->common($emailer);
            $this->email->message($mergedHtml);

            if ($this->email->send()) {
                echo "Send";
                $this->session->set_flashdata('msg', "Message sent to your Email Address.");
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('dmsg', "Error occur while sending Email.");
                redirect('admin/index');
            }
        } else {
            $this->session->set_flashdata('dmsg', "Email Address does not matches.");
            redirect('admin/index');
        }
    }

    function rent_email()
    {


        $post = $this->input->post();

        $emailer = common_emogrifier($this->load->view('emailer/_emailer_rent', array('data' => $post), true));

        email_help('santosh_@mailinator.com', 'Vehicle Reservation', $emailer, SITE_EMAIL);
        $this->session->set_flashdata('msg', 'Your Reservation Has Been Made.');
        redirect('rent');
    }

}
