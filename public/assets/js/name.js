
var result = "", url, panel = "", list, editUser = false, editRole = false;
url = window.location.href;

editUser = url.slice(0, 37) === "http://localhost:8000/admin/edit/user";
editRole = url.slice(0, 37) === "http://localhost:8000/admin/edit/role";

switch (url) {
    case "http://localhost:8000/admin/active/sessions" :
        result = document.getElementById('active-sessions-btn');
        panel = document.getElementById('active-sessions');
        list = document.getElementById('active-sessions-list');
        document.getElementById('title').innerHTML = "نشست های فعال";
        break;
    case "http://localhost:8000/admin/active/sessions#" :
        result = document.getElementById('active-sessions-btn');
        panel = document.getElementById('active-sessions');
        list = document.getElementById('active-sessions-list');
        document.getElementById('title').innerHTML = "نشست های فعال";
        break;
    case "http://localhost:8000/admin/dashboard" :
        result = document.getElementById('dashboard-btn');
        panel = document.getElementById('dashboard');
        list = document.getElementById('dashboard-list');
        document.getElementById('title').innerHTML = "پنل مدیریت";
        document.getElementById('prof').style.marginRight = "32px";
        break;
    case "http://localhost:8000/admin/dashboard#" :
        result = document.getElementById('dashboard-btn');
        panel = document.getElementById('dashboard');
        list = document.getElementById('dashboard-list');
        document.getElementById('title').innerHTML = "پنل مدیریت";
        document.getElementById('prof').style.marginRight = "32px";
        break;
    case "http://localhost:8000/admin/user/data":
        result = document.getElementById('setting-btn');
        panel = document.getElementById('setting');
        list = document.getElementById('change-users-information');
        document.getElementById('title').innerHTML = "اطلاعات کاربری";
        break;
    case "http://localhost:8000/admin/user/data#":
        result = document.getElementById('setting-btn');
        panel = document.getElementById('setting');
        list = document.getElementById('change-users-information');
        document.getElementById('title').innerHTML = "اطلاعات کاربری";
        break;
    case "http://localhost:8000/admin/users":
        result = document.getElementById('admin-btn');
        panel = document.getElementById('admin');
        list = document.getElementById('users-list');
        document.getElementById('title').innerHTML = "کاربران";
        break;
    case "http://localhost:8000/admin/users#":
        result = document.getElementById('admin-btn');
        panel = document.getElementById('admin');
        list = document.getElementById('users-list');
        document.getElementById('title').innerHTML = "کاربران";
        break;
    case "http://localhost:8000/admin/create/permission":
        result = document.getElementById('admin-btn');
        panel = document.getElementById('admin');
        list = document.getElementById('create-permission');
        document.getElementById('title').innerHTML = "ایجاد دسترسی جدید";
        break;
    case "http://localhost:8000/admin/create/permission#":
        result = document.getElementById('admin-btn');
        panel = document.getElementById('admin');
        list = document.getElementById('create-permission');
        document.getElementById('title').innerHTML = "ایجاد دسترسی جدید";
        break;
    case "http://localhost:8000/admin/roles":
        result = document.getElementById('admin-btn');
        panel = document.getElementById('admin');
        list = document.getElementById('roles-list');
        document.getElementById('title').innerHTML = "دسترسی ها";
        break;
    case "http://localhost:8000/admin/roles#":
        result = document.getElementById('admin-btn');
        panel = document.getElementById('admin');
        list = document.getElementById('roles-list');
        document.getElementById('title').innerHTML = "دسترسی ها";
        break;
}

if (editUser){
    result = document.getElementById('admin-btn');
    panel = document.getElementById('admin');
    list = document.getElementById('users-list');
    document.getElementById('title').innerHTML = "اطلاعات کاربر";
}

if (editRole){
    result = document.getElementById('admin-btn');
    panel = document.getElementById('admin');
    list = document.getElementById('roles-list');
    document.getElementById('title').innerHTML = "دسترسی ها";
}

result.classList.add('active');
panel.classList.add('open');
list.classList.add('active');
