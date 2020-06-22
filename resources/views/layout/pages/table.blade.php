
@include('.layout.header_footer.header')

<!-- begin::header -->
<div class="header">

    @include('.layout.navbar.navbar')

</div>
<!-- end::header -->

<!-- begin::main -->
<div id="main">

    <!-- begin::navigation -->
    @include('.layout.sidebar.sidebar')
    <!-- end::navigation -->

    <!-- begin::main-content -->
    <main class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>نشت های فعال</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">امنیت</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">نشست های فعال</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end::page-header -->

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">نشست های فعال</h6>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">آیپی</th>
                                        <th scope="col">سیستم عامل</th>
                                        <th scope="col">مرورگر</th>
                                        <th scope="col">آخرین فعالیت</th>
                                        <th scope="col">حذف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1 ?>
                                    @foreach($sessions as $session)
                                       @if($session->payload == $sessionMe->payload)
                                            <tr>
                                                <th scope="row">{{$count}}</th>
                                                <td>{{$session->ip_address}}</td>
                                                <td>
                                                    <figure class="avatar avatar-sm"><img src="/assets/media/image/user/icon/{{FindOS($session->user_agent)}}.png" class="rounded-circle" alt="{{FindOS($session->user_agent)}}"></figure>
                                                    {{FindOSV($session->user_agent)}}
                                                </td>
                                                <td>
                                                    <figure class="avatar avatar-sm"><img src="/assets/media/image/user/icon/{{FindBrowser($session->user_agent)}}.png" class="rounded-circle" alt="{{FindBrowser($session->user_agent)}}"></figure>
                                                    {{FindBrowserV($session->user_agent)}}
                                                </td>
                                                <td style="color: green">آنلاین</td>
                                                <td></td>
                                            </tr>
                                       @else
                                            <tr>
                                                <th scope="row">{{$count}}</th>
                                                <td>{{$session->ip_address}}</td>
                                                <td>
                                                    <figure class="avatar avatar-sm"><img src="/assets/media/image/user/icon/{{FindOS($session->user_agent)}}.png" class="rounded-circle" alt="{{FindOS($session->user_agent)}}"></figure>
                                                    {{FindOSV($session->user_agent)}}
                                                </td>
                                                <td>
                                                    <figure class="avatar avatar-sm"><img src="/assets/media/image/user/icon/{{FindBrowser($session->user_agent)}}.png" class="rounded-circle" alt="{{FindBrowser($session->user_agent)}}"></figure>
                                                    {{FindBrowserV($session->user_agent)}}
                                                </td>
                                                <td>{{ChangeTime($session->last_activity)}}</td>
                                                <td>
                                                    <form method="post" action="/admin/delete/{{$session->payload}}"> @csrf @method('DELETE') <button class="btn btn-danger">حذف</button></form>
                                                </td>
                                            </tr>
                                       @endif
                                        <?php $count++ ?>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

@include('.layout.header_footer.footer')
