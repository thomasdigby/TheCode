<div class="container">
    <div class="container music video">
        <% if Videos %>
            <% loop Videos %>
                <div class="container_hex">
                    <a href="$Link" class="anchor_1">
                        <div class="inner">
                            <h3 class="strong">$Title</h3>
                            <p>$Subtitle</p>
                        </div>
                    </a>
                    <a href="$Link" class="anchor_2"></a>
                    <a href="$Link" class="anchor_3"></a>
                </div>
            <% end_loop %>
        <% end_if %>
    </div>
</div>