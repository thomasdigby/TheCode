<div class="container">
    <div class="container player">
        <a href="$Parent.Link" class="close">Close</a>
        <h2>$Artist - $Track, $Created.format(d)/$Created.format(m)/$Created.format(Y)</h2>
        $SoundCloudWidgetURL
    </div>
    <% control PrevNextPage(prev) %>
        <a href="$Link" class="prev" title="Go to $Artist - $Track">Previous page</a>
    <% end_control %>
    <% control PrevNextPage(next) %>
        <a href="$Link" class="next" title="Go to $Artist - $Track">Next page</a>
    <% end_control %>
</div>