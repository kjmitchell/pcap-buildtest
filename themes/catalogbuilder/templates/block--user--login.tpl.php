    <?php 
            $elements = drupal_get_form('user_login_block');     
            $rendered = drupal_render($elements);
            // to see what you have to work with
             //print "<pre>ELEMENTS: " . print_r($elements,1) . "</pre>";

            $output  = '<form action="' . $elements['#action'] .
                                      '" method="' . $elements['#method'] .
                                      '" id="' . $elements['#id'] .
                                      '" accept-charset="UTF-8">';

            //$output  = '<div class="forms-pages login-page frm">';
            //$output  = '<div class="container">';
            //$output  = '<div class="main-content row">';
            $output .= "<div class='container col-xs-12' style='padding-top:180px;'>
            <h2>Welcome to the Portescap Catalog Builder.</h2>
            <p>Welcome to the Portescap Catalog Builder, a special site that allows you to create custom product catalog PDFs that can be sent to your customers for their specific product design needs.</p>
            </div>";

            $elements['name']['#children'] = '<input placeholder="Username" type="text" id="edit-name" name="name" value="" size="60" maxlength="60" class="form-text required">';
            $elements['pass']['#children'] = '<input placeholder="Password" type="password" id="edit-pass" name="pass" size="60" maxlength="128" class="form-text required">';

            $output .= "<div class='forms-pages login-page frm col-sm-4'>".$elements['name']['#children']."</div>";
            $output .= "<div class='forms-pages login-page frm col-sm-4'>".$elements['pass']['#children']."</div>";

            $output .= '<div class="col-md-4 col-sm-12">';
        
            $output .= $elements['form_build_id']['#children'];
            $output .= $elements['form_id']['#children'];

            //  $variables['form']['actions']['submit']['#value'] = t('Sign In');
            $elements['actions']['#children'] = '<input class="btn btn-primary form-submit" type="submit" id="edit-submit" name="op" value="Sign In">';
    
             //print "<pre>ELEMENTS: " . var_dump($elements) . "</pre>";

            $output .= $elements['actions']['#children'];
            $output .= '<a href="/user/password" class="handle-password primary-link"  data-modal data-target="#change-pass">Forgot Password?</a></div>';
            // $output .= $elements['links']['#children'];
            //$output .= '</div>';
            $output .= '</form>';
            print $output; 
?>


