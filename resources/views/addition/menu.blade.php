<div class='menu'>
    <ul>
        <li class='li'>
            <a class="" >
                <i class="fa-solid fa-person-walking-luggage"></i>
                <span>طلبات التوظيف</span>
                <i class='fa fa-angle-left'></i>
            </a>
            <ul class='mm-collapse'>
                <li>
                    <a href="{{ route('specific') }}" class="">
                        <i class='fas fa-file-invoice'></i>
                        <span> الطلبات </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('delete_specific_index') }}">
                        <i class="fa-solid fa-trash"></i>
                        <span> المحذوفات </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class='li'>
            <a  class=''>
                <i class="fa-solid fa-person-hiking"></i>
                <span>قائمة المعينيين</span>
                <i class='fa fa-angle-left'></i>
            </a>
            <ul class='mm-collapse'>
                <li>
                    <a href={{ route('appointed') }}>
                        <i class='fa-solid fa-id-card-clip'></i>
                        <span> المعينيين  </span>
                    </a>
                </li>
                <li>
                    <a href={{ route('delete_appointed_index') }}>
                        <i class="fa-solid fa-trash"></i>
                        <span> المحذوفات </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class='li'>
            <a class=''>
                <i class="fa-solid fa-signs-post"></i>
                <span>قائمة المؤجلين</span>
                <i class='fa fa-angle-left'></i>
            </a>
            <ul class='mm-collapse'>
                <li>
                    <a  href={{ route('postpone') }}>
                        <i class='fa-solid fa-info'></i>
                        <span> المؤجلين  </span>
                    </a>
                </li>
                <li>
                    <a href={{ route('delete_postpone_index') }}>
                        <i class="fa-solid fa-trash"></i>
                        <span> المحذوفات  </span>
                    </a>
                </li>
            </ul>
        </li>
        <li class='li settings'>
            <a href='settings' id="settings">
                <i class="fa-solid fa-gear"></i>
                <span>الاعدادات</span>
            </a>
        </li>
    </ul>
</div>
