<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?php echo e(route('dashboard')); ?>">
            <img class="mx-auto" src="<?php echo e(cache('settings') != null ? asset('uploads/'.cache('settings')['logo']) : ''); ?>" alt="Rabeh" width="50px">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item">
          <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">لوحة التحكم</span>
          </a>
        </li>
        <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('manage-students|show-students|create-students|show-students-archive')): ?>
            <li class="nav-item dropdown">
                <a href="#Students" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-pen-tool fe-16"></i>
                    <span class="ml-3 item-text">الطلاب</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="Students">
                    <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('manage-students|show-students')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('students.index')); ?>"><span class="ml-1 item-text">عرض الطلاب</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('manage-students|create-students')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('students.create')); ?>"><span class="ml-1 item-text">إضافة طلاب</span></a>
                    </li>
                    <?php endif; ?>
                    <?php if(Auth()->user()->hasRole('admin') || Auth()->user()->hasPermission('manage-students|show-students-archive')): ?>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="<?php echo e(route('archive.index')); ?>"><span class="ml-1 item-text">الارشيف</span></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
            <a href="#queries" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-file fe-16"></i>
              <span class="ml-3 item-text">ألاستعلامات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="queries">
              <li class="nav-item">
                  <a class="nav-link pl-3" data-toggle="modal" data-target="#studentListModal" href="javascript:void();"><span class="ml-1 item-text">القوائم</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" data-toggle="modal" data-target="#supplementListModal" href="javascript:void();"><span class="ml-1 item-text">القوائم للملاحق والبدائل</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('grades.semester.data')); ?>"><span class="ml-1 item-text">عرض نتيجة فصل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('supplements.data')); ?>"><span class="ml-1 item-text">عرض نتيجة ملاحق | بدائل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" data-toggle="modal" data-target="#studentResultModal" href="javascript:void();"><span class="ml-1 item-text">عرض نتيجة طالب</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('student-grades.semester-data')); ?>"><span class="ml-1 item-text">عرض نتيجة فصل لطالب</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('grades-statistics.data')); ?>"><span class="ml-1 item-text">إحصاء نسبة النجاح</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#exams" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-edit-3 fe-16"></i>
              <span class="ml-3 item-text">النتائج</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="exams">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="<?php echo e(route('grades.index')); ?>"><span class="ml-1 item-text">ادخال نتيجة فصل</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('student-grades.index')); ?>"><span class="ml-1 item-text">ادخال نتيجة طالب</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('supplements.index')); ?>"><span class="ml-1 item-text">ادخال نتيجة ملحق | بديل</span>
                </a>
            </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('grades.delete')); ?>"><span class="ml-1 item-text">حذف نتيجة مادة لفصل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('grades.increase.success')); ?>"><span class="ml-1 item-text">زيادة مستوى النجاح</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#sections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-folder fe-16"></i>
              <span class="ml-3 item-text">الاقسام</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="sections">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="<?php echo e(route('sections.index')); ?>"><span class="ml-1 item-text">عرض الاقسام</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('sections.create')); ?>"><span class="ml-1 item-text">إضافة قسم</span>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item dropdown">
            <a href="#subjects" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-book-open fe-16"></i>
              <span class="ml-3 item-text">المواد</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="subjects">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('subjects.index')); ?>"><span class="ml-1 item-text">عرض المواد</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('subjects.create')); ?>"><span class="ml-1 item-text">إضافة مادة</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#teachers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-briefcase fe-16"></i>
              <span class="ml-3 item-text">الاساتذة</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="teachers">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('teachers.index')); ?>"><span class="ml-1 item-text">عرض الاساتذة</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('teachers.create')); ?>"><span class="ml-1 item-text">إضافة استاذ</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#subjectsTeachers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-link fe-16"></i>
              <span class="ml-3 item-text">المواد والاساتذة</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="subjectsTeachers">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('subjects-teachers.index')); ?>"><span class="ml-1 item-text"> عرض</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('subjects-teachers.create')); ?>"><span class="ml-1 item-text">دمج</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#equations" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-plus-square fe-16"></i>
              <span class="ml-3 item-text">طريقة الحساب</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="equations">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('equations.index')); ?>"><span class="ml-1 item-text">عرض الكل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('equations.create')); ?>"><span class="ml-1 item-text">إضافة</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#marks" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-flag fe-16"></i>
              <span class="ml-3 item-text">الدرجات والرموز</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="marks">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('marks.index')); ?>"><span class="ml-1 item-text">عرض الكل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('marks.create')); ?>"><span class="ml-1 item-text">إضافة</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#years" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-calendar fe-16"></i>
              <span class="ml-3 item-text">السنين الدراسية</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="years">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('years.index')); ?>"><span class="ml-1 item-text">عرض الكل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('years.create')); ?>"><span class="ml-1 item-text">إضافة</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#relays" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-copy fe-16"></i>
              <span class="ml-3 item-text">الترحيلات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="relays">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('relays.index')); ?>"><span class="ml-1 item-text">عرض الترحيلات</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('relays.create')); ?>"><span class="ml-1 item-text">ترحيل جديد</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-users fe-16"></i>
              <span class="ml-3 item-text">المستخدمين</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="users">
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('users.index')); ?>"><span class="ml-1 item-text">عرض المستخدمين</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="<?php echo e(route('users.create')); ?>"><span class="ml-1 item-text">إضافة مستخدم</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('settings.index')); ?>" class="nav-link">
              <i class="fe fe-settings fe-16"></i>
              <span class="ml-3 item-text">الاعدادات</span>
            </a>
          </li>
      </ul>
    </nav>
  </aside>
<?php /**PATH /home/altayeb/Desktop/university/resources/views/layouts/aside.blade.php ENDPATH**/ ?>