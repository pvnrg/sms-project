<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{\config('admin.APP_NAME')}}</title>
    <style>
        @include('email.mailtemplate.assets.default')
    </style>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        
        <td class="container">
            <div class="content">
                <table class="main">
                    <tr>
                        <!-- Header -->
                        <td>
                            <tr>
                                <td class="header"><h1>
								<a href="{{ url('')}}"><img src="{{\config('admin.WEB_URL')}}/assets/images/logo.png"></a>
								</h1></td>
                            </tr>
                        </td>
                        <td class="wrapper">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        @yield('body')
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- END MAIN CONTENT AREA -->
                </table>

                <!-- START FOOTER -->
                <div class="footer main">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-block">
                                Kind Regards <br/>
								{{\config('admin.APP_NAME')}} Team
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- END FOOTER -->

                <!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        
    </tr>
</table>
</body>
</html>
