<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

    
                  <img src="https://upload.wikimedia.org/wikipedia/en/4/41/SVIET-transparent-Logo.png" alt="Logo" width="80" class="mx-auto">
                
        <a href="#" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item ">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->

        


        <div class="sidebar">
            <ul>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Offer Letter</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_ol') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Create Letter</div>
                            </a>
                        </li>
                       
                    </ul>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('view_ol') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">View Letter</div>
                            </a>
                        </li>
                       
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Acceptance Letter</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_course_type') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Create Letter</div>
                            </a>
                        </li>
                       
                    </ul>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_course_category') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">View Letter</div>
                            </a>
                        </li>
                       
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="menu-item">
                    <a href="#" class="menu-link menu-toggle" data-toggle="collapse" data-target="#coursesDropdown">
                        <i class="menu-icon tf-icons bx bx-layout"></i>
                        <div data-i18n="Layouts">Bonofide</div>
                    </a>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_course_type') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">Create Bonofide</div>
                            </a>
                        </li>
                       
                    </ul>

                    <ul id="coursesDropdown" class="menu-sub collapse">
                        <li class="menu-item">
                            <a href="{{ url('create_course_category') }}" class="menu-link" target="_self">
                                <div data-i18n="Create Route">View Bonofide</div>
                            </a>
                        </li>
                       
                    </ul>
                </li>
            </ul>
        </div>


    </ul>

</aside>
