<?php
/**
 * Template part for displaying mail chimp
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cloudsdale_Theme
 */

?><div id="mc_embed_shell m-5">
    <style type="text/css">
    #mc_embed_signup {}

    .mc-field-group input,
    .mc-field-group input:focus {
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #dfc797;
        color: #dfc797;
        outline: 0;
    }

    .mc-field-group .email,
    .mc-field-group .name-input {
        width: 100%;
    }

    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup">
        <form
            action="https://thecliftonnw8.us20.list-manage.com/subscribe/post?u=84bc3b8cc1e507571a0ac94fa&amp;id=4f2251bba3&amp;f_id=002b04eaf0"
            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
            target="_blank">
            <div id="mc_embed_signup_scroll">
                <div class="mc-field-group mb-1">
                    <label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label>

                    <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="">
                    <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
                </div>

                <div class="mc-field-group mb-2">
                    <label for="mce-FNAME">First Name </label>
                    <input type="text" name="FNAME" class="name-input text" id="mce-FNAME" value="">
                </div>
                <div class="mc-field-group size1of2 mb-2">
                    <label for="mce-BIRTHDAY-month">Birthday </label>
                    <div class="datefield">
                        <span class="subfield monthfield">

                            <input class="birthday REQ_CSS" type="text" pattern="[0-9]*" placeholder="DD" size="2"
                                maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day" value="">
                            <input class="birthday REQ_CSS" type="text" pattern="[0-9]*" placeholder="MM" size="2"
                                maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month" value=""></span> /<span
                            class="subfield dayfield">
                        </span>
                        <span class="small-meta nowrap">( dd / mm )</span>
                    </div>
                </div>
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display: none;"></div>
                    <div class="response" id="mce-success-response" style="display: none;"></div>
                </div>
                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                        name="b_84bc3b8cc1e507571a0ac94fa_4f2251bba3" tabindex="-1" value=""></div>

                <button value="Subscribe" type="submit" name="subscribe" id="mc-embedded-subscribe" type="button"
                    class="btn btn-light">join us</button>

            </div>
        </form>
    </div>
    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
    <script type="text/javascript">
    (function($) {
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0] = 'EMAIL';
        ftypes[0] = 'email';
        fnames[1] = 'FNAME';
        ftypes[1] = 'text';
        fnames[5] = 'BIRTHDAY';
        ftypes[5] = 'birthday';
        fnames[2] = 'LNAME';
        ftypes[2] = 'text';
        fnames[3] = 'ADDRESS';
        ftypes[3] = 'address';
        fnames[4] = 'PHONE';
        ftypes[4] = 'phone';
    }(jQuery));
    var $mcj = jQuery.noConflict(true);
    </script>
</div>