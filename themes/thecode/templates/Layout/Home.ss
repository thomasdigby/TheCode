<div class="container_content">
    $Content
    <!--<img src="$Image.Link" class="home_image" />-->
    <ul class="list_reset list_inline list_social">
        <% if $FacebookLink %>
        <li>
            <a href="$FacebookLink" class="link_facebook">Facebook</a>
        </li>
        <% end_if %>
        <% if InstagramLink %>
        <li>
            <a href="$InstagramLink" class="link_instagram">Instagram</a>
        </li>
        <% end_if %>
        <% if VimeoLink %>
        <li>
            <a href="$VimeoLink" class="link_vimeo">Vimeo</a>
        </li>
        <% end_if %>
        <% if SoundcloudLink %>
        <li>
            <a href="$SoundcloudLink" class="link_soundcloud">Soundcloud</a>
        </li>
        <% end_if %>
    </ul>
    <hr>
    <p>
        Keep up to date with all our events and receive special members&rsquo; discounts.
        Become a Codependent here:
    </p>
    <!-- Begin MailChimp Signup Form -->
    <div id="mc_embed_signup">
        <form action="//facebook.us8.list-manage.com/subscribe/post?u=202f36f316490a5f2e31deea6&amp;id=77bbfc6bbc" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form_email" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">

        <div class="mc-field-group">
            <!-- <label for="mce-EMAIL">Email Address </label> -->
            <input type="email" value="Email" name="EMAIL" class="required email" id="mce-EMAIL">
        </div>
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_202f36f316490a5f2e31deea6_77bbfc6bbc" tabindex="-1" value=""></div>
            <div class=""><input type="submit" value="SUBMIT" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
    </div>
    <% if LinkImage %>
        <a href="$LinkImage" target="_blank" class="link_image">
            $Image
        </a>
    <% else %>
        $Image
    <% end_if %>
</div>