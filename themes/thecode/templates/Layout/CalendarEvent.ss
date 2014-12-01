<div class="container">
        <h2 class="title_event">$Year.$StringMonth.$Day</h2>
        <div class="container event">
                <div class="media">
                        <div class="med left">
                                $Photo
                                <a href="/calendar-events/date/2013/" class="close">Close</a>
                                <!-- calendar-events/date/$Year/$Month -->
                        </div>
                        <div class="bd">
                                $Content
                        </div>
                </div>
        </div>
        <% control PrevNextPage(prev) %>
        <a href="$Link" class="prev" title="Go to previous event">Previous event</a>
    <% end_control %>
    <% control PrevNextPage(next) %>
        <a href="$Link" class="next" title="Go to next event">Next event</a>
    <% end_control %>
</div>