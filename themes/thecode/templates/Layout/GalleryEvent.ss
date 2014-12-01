<div class="container">
    <div class="container gallery">
        <h1>$Title, $Description, $Location, $Date.Nice</h1>
        <a href="gallery/" class="close">Close</a>
        <div class="swiper-container" data-carousel>
            <div class="swiper-wrapper">
                <% if GalleryImages %>
                    <% loop GalleryImages %>
                        <div class="swiper-slide">
                            $Image
                        </div>
                    <% end_loop %>
                <% end_if %>
            </div>
        </div>
        <button class="direction_next" data-carousel-direction="next">Next</button>
        <button class="direction_prev" data-carousel-direction="prev">Prev</button>
        <ul class="swiper-thumbnail-container list_reset list_inline" data-carousel-thumbnail>
            <% if GalleryImages %>
                <% loop GalleryImages %>
                    <li>
                        <button>
                            $Image
                        </button>
                    </li>
                <% end_loop %>
            <% end_if %>
        </ul>
    </div>
</div>