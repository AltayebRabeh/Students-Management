<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?php echo e(route('dashboard')); ?>">
            <img class="mx-auto" src="<?php echo e(cache('settings') != null ? asset('uploads/'.cache('settings')['logo']) : asset('/uploads/settings/logo.png')); ?>" alt="" width="50px">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item">
          <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">لوحة التحكم</span>
          </a>
        </li>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-students|create-students|show-students-archive')): ?>
            <li class="nav-item dropdown">
                <a href="#Students" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-edit-3 fe-16"></i>
                    <span class="ml-3 item-text">الطلاب</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="Students">
                    <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-students')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('students.index')); ?>"><span class="ml-1 item-text">عرض الطلاب</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-students')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('students.create')); ?>"><span class="ml-1 item-text">إضافة طلاب</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-students-archive')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('archive.index')); ?>"><span class="ml-1 item-text">الارشيف</span></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-student-grades|print-students-list|print-student-semester-grades|print-check-list|print-supplements|print-supplements-list|print-semester-grades|print-grades-statistics')): ?>
        <li class="nav-item dropdown">
            <a href="#queries" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-file fe-16"></i>
              <span class="ml-3 item-text">ألاستعلامات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="queries">
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-students-list')): ?>
                    <li class="nav-item">
                    <a class="nav-link pl-3" data-toggle="modal" data-target="#studentListModal" href="javascript:void();"><span class="ml-1 item-text">طباعة القوائم</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-check-list')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3 general-modal" data-href="<?php echo e(route('supplements.check.list')); ?>" data-title="طباعة قوائم الدرجات"  data-toggle="modal" data-target="#generalListModal" data-varyModalLabel="طباعة قوائم الدرجات" href="javascript:void();"><span class="ml-1 item-text">طباعة قوائم الدرجات</span>
                    </a>
                </li>
            <?php endif; ?>
              <?php if(Auth()->user()->hasRole('admin')|| Auth()->user()->hasPermission('print-supplements-list')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3 general-modal" data-href="<?php echo e(route('supplements.list')); ?>" data-title="طباعة القوائم ملاحق | بدائل" data-toggle="modal" data-target="#generalListModal" href="javascript:void();"><span class="ml-1 item-text">طباعة قوائم ملاحق | بدائل</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-semester-grades')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="<?php echo e(route('grades.semester.data')); ?>"><span class="ml-1 item-text">طباعة نتيجة فصل</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-supplements')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="<?php echo e(route('supplements.data')); ?>"><span class="ml-1 item-text">طباعة نتيجة ملاحق | بدائل</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-student-grades')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3" data-toggle="modal" data-target="#studentResultModal" href="javascript:void();"><span class="ml-1 item-text">طباعة تفاصيل طالب</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-student-semester-grades')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="<?php echo e(route('student-grades.semester-data')); ?>"><span class="ml-1 item-text">طباعة فصل لطالب</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('print-grades-statistics')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="<?php echo e(route('grades-statistics.data')); ?>"><span class="ml-1 item-text">طباعة نسبة النجاح</span>
                    </a>
                </li>
            <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-semester-grades|edit-semester-grades|delete-semester-grades|create-supplements|create-student-grades|delete-student-grades')): ?>
        <li class="nav-item dropdown">
            <a href="#exams" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-check fe-16"></i>
              <span class="ml-3 item-text">النتائج</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="exams">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-semester-grades')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('grades.index')); ?>"><span class="ml-1 item-text">ادخال نتيجة فصل</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-student-grades')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('student-grades.index')); ?>"><span class="ml-1 item-text">ادخال نتيجة طالب</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-supplements')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('supplements.index')); ?>"><span class="ml-1 item-text">ادخال نتيجة ملحق | بديل</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('delete-semester-grades')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('grades.delete')); ?>"><span class="ml-1 item-text">حذف نتيجة مادة لفصل</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('edit-semester-grades')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('grades.increase.success')); ?>"><span class="ml-1 item-text">زيادة مستوى النجاح</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-sections|create-sections')): ?>
        <li class="nav-item dropdown">
            <a href="#sections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-folder fe-16"></i>
              <span class="ml-3 item-text">الاقسام</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="sections">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-sections')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('sections.index')); ?>"><span class="ml-1 item-text">عرض الاقسام</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-sections')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('sections.create')); ?>"><span class="ml-1 item-text">إضافة قسم</span>
                        </a>
                    </li>
              <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-subjects|create-subjects')): ?>
        <li class="nav-item dropdown">
            <a href="#subjects" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-book-open fe-16"></i>
              <span class="ml-3 item-text">المواد</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="subjects">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-subjects')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('subjects.index')); ?>"><span class="ml-1 item-text">عرض المواد</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-subjects')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('subjects.create')); ?>"><span class="ml-1 item-text">إضافة مادة</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-teachers|create-teachers')): ?>
        <li class="nav-item dropdown">
            <a href="#teachers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-briefcase fe-16"></i>
              <span class="ml-3 item-text">الاساتذة</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="teachers">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-teachers')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('teachers.index')); ?>"><span class="ml-1 item-text">عرض الاساتذة</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-teachers')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('teachers.create')); ?>"><span class="ml-1 item-text">إضافة استاذ</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-subjects-teachers|create-subjects-teachers')): ?>
        <li class="nav-item dropdown">
            <a href="#subjectsTeachers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-link fe-16"></i>
              <span class="ml-3 item-text">المواد والاساتذة</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="subjectsTeachers">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-subjects-teachers')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('subjects-teachers.index')); ?>"><span class="ml-1 item-text"> عرض</span>
                        </a>
                    </li>
              <?php endif; ?>
              <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-subjects-teachers')): ?>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="<?php echo e(route('subjects-teachers.create')); ?>"><span class="ml-1 item-text">دمج</span>
                    </a>
                </li>
              <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-equations|create-equations')): ?>
        <li class="nav-item dropdown">
            <a href="#equations" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-plus-square fe-16"></i>
              <span class="ml-3 item-text">المعادلات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="equations">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-equations')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('equations.index')); ?>"><span class="ml-1 item-text">عرض الكل</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-equations')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('equations.create')); ?>"><span class="ml-1 item-text">إضافة</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-marks|create-marks')): ?>
        <li class="nav-item dropdown">
            <a href="#marks" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-flag fe-16"></i>
              <span class="ml-3 item-text">الدرجات والرموز</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="marks">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-marks')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('marks.index')); ?>"><span class="ml-1 item-text">عرض الكل</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-marks')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('marks.create')); ?>"><span class="ml-1 item-text">إضافة</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-years|create-years')): ?>
        <li class="nav-item dropdown">
            <a href="#years" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-calendar fe-16"></i>
              <span class="ml-3 item-text">السنين الدراسية</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="years">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-years')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('years.index')); ?>"><span class="ml-1 item-text">عرض الكل</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-years')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('years.create')); ?>"><span class="ml-1 item-text">إضافة</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-relays|create-relays')): ?>
        <li class="nav-item dropdown">
            <a href="#relays" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-copy fe-16"></i>
              <span class="ml-3 item-text">الترحيلات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="relays">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-relays')): ?>  
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('relays.index')); ?>"><span class="ml-1 item-text">عرض الترحيلات</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-relays')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('relays.create')); ?>"><span class="ml-1 item-text">ترحيل جديد</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-users|create-users')): ?>
        <li class="nav-item dropdown">
            <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-users fe-16"></i>
              <span class="ml-3 item-text">المستخدمين</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="users">
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('show-users')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('users.index')); ?>"><span class="ml-1 item-text">عرض المستخدمين</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('create-users')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('users.create')); ?>"><span class="ml-1 item-text">إضافة مستخدم</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('activity-log')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('activity.log')); ?>" class="nav-link">
                <i class="fe fe-activity fe-16"></i>
                <span class="ml-3 item-text">Activity Log</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('settings')): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('settings.index')); ?>" class="nav-link">
                <i class="fe fe-settings fe-16"></i>
                <span class="ml-3 item-text">الاعدادات</span>
            </a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </aside>
<?php /**PATH /home/altayeb/Desktop/university/resources/views/layouts/aside.blade.php ENDPATH**/ ?>