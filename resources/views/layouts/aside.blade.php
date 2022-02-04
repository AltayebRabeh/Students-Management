<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <img src="{{ asset('uploads/'.cache('settings')['logo']) }}" alt="Rabeh" width="50px">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">لوحة التحكم</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a href="#Students" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text">الطلاب</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="Students">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('students.index') }}"><span class="ml-1 item-text">عرض الطلاب</span>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('students.create') }}"><span class="ml-1 item-text">إضافة طلاب</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('archive.index') }}"><span class="ml-1 item-text">الارشيف</span>
                </a>
              </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#lists" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-list fe-16"></i>
              <span class="ml-3 item-text">القوائم</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="lists">
              <li class="nav-item">
                  <a class="nav-link pl-3" data-toggle="modal" data-target="#studentListModal" href="javascript:void();"><span class="ml-1 item-text">القوائم الطلاب</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" data-toggle="modal" data-target="#supplementListModal" href="javascript:void();"><span class="ml-1 item-text">القوائم الطلاب للملاحق والبدائل</span>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#exams" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-bookmark fe-16"></i>
              <span class="ml-3 item-text">النتائج</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="exams">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('grades.index') }}"><span class="ml-1 item-text">ادخال نتيجة فصل</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('student-grades.index') }}"><span class="ml-1 item-text">ادخال نتيجة طالب</span>
                </a>
                </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('grades.semester.data') }}"><span class="ml-1 item-text">عرض نتيجة فصل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" data-toggle="modal" data-target="#studentResultModal" href="javascript:void();"><span class="ml-1 item-text">عرض نتيجة طالب</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('student-grades.semester-data') }}"><span class="ml-1 item-text">عرض نتيجة فصل لطالب</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('grades.delete') }}"><span class="ml-1 item-text">حذف نتيجة مادة لفصل</span>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#supplements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-box fe-16"></i>
              <span class="ml-3 item-text">الملاحق والبدائل</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="supplements">
              <li class="nav-item">
                  <a class="nav-link pl-3" href="{{ route('supplements.index') }}"><span class="ml-1 item-text">ادخال نتيجة</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('supplements.data') }}"><span class="ml-1 item-text">عرض نتيجة</span>
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
                  <a class="nav-link pl-3" href="{{ route('sections.index') }}"><span class="ml-1 item-text">عرض الاقسام</span>
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('sections.create') }}"><span class="ml-1 item-text">إضافة قسم</span>
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
                <a class="nav-link pl-3" href="{{ route('subjects.index') }}"><span class="ml-1 item-text">عرض المواد</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('subjects.create') }}"><span class="ml-1 item-text">إضافة مادة</span>
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
                <a class="nav-link pl-3" href="{{ route('teachers.index') }}"><span class="ml-1 item-text">عرض الاساتذة</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('teachers.create') }}"><span class="ml-1 item-text">إضافة استاذ</span>
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
                <a class="nav-link pl-3" href="{{ route('subjects-teachers.index') }}"><span class="ml-1 item-text">عرض المواد والاساتذة</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('subjects-teachers.create') }}"><span class="ml-1 item-text">دمج</span>
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
                <a class="nav-link pl-3" href="{{ route('equations.index') }}"><span class="ml-1 item-text">عرض الكل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('equations.create') }}"><span class="ml-1 item-text">إضافة</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#marks" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-flag fe-16"></i>
              <span class="ml-3 item-text">العلامات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="marks">
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('marks.index') }}"><span class="ml-1 item-text">عرض الكل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('marks.create') }}"><span class="ml-1 item-text">إضافة</span>
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
                <a class="nav-link pl-3" href="{{ route('years.index') }}"><span class="ml-1 item-text">عرض الكل</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('years.create') }}"><span class="ml-1 item-text">إضافة</span>
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
                <a class="nav-link pl-3" href="{{ route('relays.index') }}"><span class="ml-1 item-text">عرض الترحيلات</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('relays.create') }}"><span class="ml-1 item-text">ترحيل جديد</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-user fe-16"></i>
              <span class="ml-3 item-text">المستخدمين</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="users">
              <li class="nav-item">
                <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">عرض المستخدمين</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">إضافة مستخدم</span>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('settings.index') }}" class="nav-link">
              <i class="fe fe-settings fe-16"></i>
              <span class="ml-3 item-text">الاعدادات</span>
            </a>
          </li>
      </ul>
    </nav>
  </aside>
