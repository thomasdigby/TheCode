<div class="container">
    <div class="container player">
        <a href="$Parent.Link" class="close">Close</a>
        <h2>$Title, $Subtitle</h2>
        $VideoStuff
    </div>
    <% control PrevNextPage(prev) %>
        <a href="$Link" class="prev" title="Go to $Title">Previous page</a>
    <% end_control %>
    <% control PrevNextPage(next) %>
        <a href="$Link" class="next" title="Go to $Title">Next page</a>
    <% end_control %>
</div>