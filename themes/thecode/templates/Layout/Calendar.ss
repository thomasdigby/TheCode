<div class="container">
        <h2 class="title_calendar">$Year<% if $getMonth %>.$Month<% end_if %></h2>
        <div <% if $getMonth %>class='container calendar small'<% else %>class='container calendar'<% end_if %>>
                <% if $getdate %>
                        <% if $getMonth %>
                                <% loop $getDate %>
                                        <% if $EventLink %>
                                                <div class="container_hex small highlight">
                                                        <a href="/calendar-events/$EventLink" class="anchor_1">
                                                                <div class="inner">
                                                                        $Date
                                                                </div>
                                                        </a>
                                                        <a href="/calendar-events/$EventLink" class="anchor_2"></a>
                                                        <a href="/calendar-events/$EventLink" class="anchor_3"></a>
                                                </div>
                                        <% else %>
                                                <div class="container_hex small">
                                                        <span class="anchor_1">
                                                                <div class="inner">
                                                                        $Date
                                                                </div>
                                                        </span>
                                                        <span href="#" class="anchor_2"></span>
                                                        <span href="#" class="anchor_3"></span>
                                                </div>
                                        <% end_if %>
                                <% end_loop %>
                        <% else %>
                                <% loop $getDate %>
                                        <div class="container_hex large">
                                                <a href="/calendar-events/date/$Year/$Number" class="anchor_1">
                                                        <div class="inner">
                                                                $Date
                                                        </div>
                                                </a>
                                                <a href="/calendar-events/date/$Year/$Number" class="anchor_2"></a>
                                                <a href="/calendar-events/date/$Year/$Number" class="anchor_3"></a>
                                        </div>
                                <% end_loop %>
                        <% end_if %>
                <% end_if %>
                <% if $getdate %>
                        <% if $getMonth %>
                                <a href="/calendar-events/date/2013/" class="close">Close</a>
                        <% end_if %>
                <% end_if %>
        </div>
        <% if $showPrevMonth %>
                <a href="/calendar-events/date/$getYear/$getPrevLink" class="prev">Prev</a>
        <% else_if $showPrevYear %>
                <a href="/calendar-events/date/$getPrevLink" class="prev">Prev</a>
        <% end_if %>
        <% if $showNextMonth %>
                <a href="/calendar-events/date/$getYear/$getNextLink" class="next">Next</a>
        <% else_if $showNextYear %>
                <a href="/calendar-events/date/$getNextLink" class="next">Next</a>
        <% end_if %>
</div>