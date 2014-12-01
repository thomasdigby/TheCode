<div class="container">
        <div class="container music">
                <% if musicTracks %>
                        <% loop musicTracks %>

                                <div class="container_hex">
                                        <a href="$Link" class="anchor_1">
                                                <div class="inner">
                                                        <h3 class="strong">$Artist</h3>
                                                        <p>$Track</p>
                                                </div>
                                        </a>
                                        <a href="$Link" class="anchor_2"></a>
                                        <a href="$Link" class="anchor_3"></a>
                                </div>
                        <% end_loop %>
                <% end_if %>
        </div>
</div>
