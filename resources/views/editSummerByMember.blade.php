<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
      <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <title>แอดมินแก้ไขคำถาม</title>
    <!-- Styles -->
    <link href="https://animal-aid.me/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {"csrfToken":"lTGlgWKoqayN8ejijUYGiNOqRPDyRt58eg8QpU7w"};
    </script>
    <style>
    .navbar>.container-fluid .navbar-brand, .navbar>.container .navbar-brand {
        margin-left: -34px;
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  style="font-size:20px;"  href="all">Animals A-I-D</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li >
                        <a href="../dm">การบริจาคเงิน</a>
                    </li>
                    <li>
                        <a href="../db">การบริจาคเลือด</a>
                    </li>
                    <li>
                        <a href="../da">หาบ้านให้สัตว์</a>
                    </li>
                    <li  >
                        <a href="../newsAll">ข่าวสารและกิจกรรม</a>
                    </li>
                    <li class="active" >
                        <a href="../allQuestions">สอบถามผู้รู้เกี่ยวกับสัตว์เลี้ยง</a>
                    </li>


                </ul>
                <!--check login -->
           <ul class="nav navbar-nav navbar-right">
             @if(!empty($position))
               @if( $position== 'admin')
                 <li class="fl">
              <a href="../admin">การจัดการ</a>
            </li>
          @endif
        @endif
               <!-- Authentication Links -->
              <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="fl"><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                        <li class="fl"><a href="{{ route('register') }}">สมัครสมาชิก</a></li>
                    @else
                      <li class="dropdown fl">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->position=='user')
                            <li class="fl">
                              <a href="userProfile">ข้อมูลส่วนตัวผู้ใช้ </a>
                            </li>
                            <li class="fl">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    ออกจากระบบ
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                          @else <li class="fl">
                             <a href="../adminProfile">ข้อมูลส่วนตัวแอดมิน</a>
                           </li>
                              <li class="fl">
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      ออกจากระบบ
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}

                                  </form>
                              </li>
                            @endif
                          </ul>
                      </li>
                    @endif
           </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br>
    <br>
    <br>
    <div id="app">


    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center><h4>แก้ไขคำถาม </h4></center>
        </div>
        <div class="panel-body">
        <form action="{{url('updateSummer2')}}" method="post">
            {{ Form::token() }}
          <div class="form-group">
            <label for="topic">ชื่อผู้ถาม</label>
              <input type="hidden" name="id" value="{{$data->id}}">
            คุณ : <input type="text" name="name" id="name" class="form-control" value=" {{$data->name}}">
          </div>
          <div class="form-group">
            <label for="topic">หัวเรื่อง</label>
          <input type="text" name="topic" id="topic" class="form-control"  value="{{$data->topic}}">
          </div>
          <div class="form-group">
            <textarea id="summernote" name="summernote" class="form-control">
              {{$data->content}}
            </textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="send" id="send" value="create" class="btn btn-success">
            <input type="button" name="clear" id="clear" class="btn btn-danger pull-right" value="Clear">

          </div>
          @if (Auth::guest())
              <input type="hidden"  name="userid" value="{{ Auth::user()->id }}"/>
          @else
            <input type="hidden"  name="userid" value=" {{ Auth::user()->id }}"/>
          @endif
        </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
         $(document).ready(function(){
           $('#summernote').summernote({
            height:'300px',
            placeholder:'content here ..' //placeholderเสือกไม่ขึ้น งง
          //  fontNames:['Arial','Arial Black','Khmer OS'],
          })
     })
     $('#clear').on('click',function(){
       $('#summernote').summernote('code',null);
     })
</script>
  </body>
</html>