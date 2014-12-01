<div class="container">
    <div class="container gallery">
        <% if $Children %>
            <% loop $Children %>
                
                <div class="container_hex">
                    <a href="$Link" class="anchor_1">
                        <div class="inner">
                            <p class="title">$Title</p>
                            <p class="description">$Description</p>
                            <p class="location">$Location</p>
                            <p class="date">
                                $Date.Nice
                            </p>
                        </div>
                    </a>
                    <a href="gallery_event.html" class="anchor_2"></a>
                    <a href="gallery_event.html" class="anchor_3"></a>
                </div>

            <% end_loop %>

        <% end_if %>
        
    </div>
</div>
