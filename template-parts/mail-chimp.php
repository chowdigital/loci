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
        padding-top: 11px;
        color: #0e4c6b;
        outline: 0;
    }

    .mc-field-group .email,
    .mc-field-group .name-input {
        width: 100%;
    }



    .btn-navy {
        color: #dfc797;
        background-color: #0e4c6b;
        border: none;
        border-radius: 0;
        flex-basis: 30%;

    }

    .btn-navy h3 {
        margin-bottom: 0;

    }

    #mc_embed_signup_scroll {
        color: #0e4c6b;
        background-color: #dfc797;
        flex-basis: 70%;
    }

    input {
        font-size: 1.75rem;
        font-family: "Monthoers", sans-serif;
        letter-spacing: .1em;
        text-transform: lowercase;
        text-align: center;
    }

    #mc_embed_signup div.mce_inline_error {
        margin: 0 0 1em 0;
        padding: 5px 10px;
        background-color: #4fbded;

        z-index: 1;
        color: #0e4c6b;
    }

    #mc_embed_signup input.mce_inline_error {
        border-color: none;
    }

    #mc-embedded-subscribe:hover {
        color: #d49229;
        transition: all .3s ease-out;

    }

    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div id="mc_embed_signup" class="testclass2" style="position: relative;">
        <form
            action="https://thecliftonnw8.us20.list-manage.com/subscribe/post?u=84bc3b8cc1e507571a0ac94fa&amp;id=437b50ead5&amp;f_id=001e14eaf0"
            method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"
            target="_blank">

            <div class="form-box">
                <div id="mc_embed_signup_scroll">
                    <div class="mc-field-group v-center bg-craft">

                        <input type="email" name="EMAIL" class="required email v-center" id="mce-EMAIL" required=""
                            value="" placeholder="Your Email">
                        <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
                    </div>



                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display: none;"></div>
                        <div class="response" id="mce-success-response" style="display: none;"></div>
                    </div>
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                            name="b_84bc3b8cc1e507571a0ac94fa_4f2251bba3" tabindex="-1" value=""></div>


                </div>
                <button value="Subscribe" type="submit" name="subscribe" id="mc-embedded-subscribe" type="button"
                    class="btn-navy v-center bg-craft navy-overlay">
                    <h3>join us</h3>
                </button>
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