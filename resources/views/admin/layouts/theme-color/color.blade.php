.skin-blue .main-header .logo,
.skin-blue .main-header .navbar{
    background-color: {{App\Models\ThemeColor::first()->admin}};
}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{
    background-color: {{App\Models\ThemeColor::first()->adminSideBar}};
}