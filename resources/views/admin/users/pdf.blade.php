<html>
<html lang="ar" dir="{{(\Illuminate\Support\Facades\App::isLocale('ar') ? 'rtl' : 'ltr')}}">

<head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Gowun+Batang&display=swap');
        @font-face {
            font-family: 'Cairo';
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #000000;
            /*text-align: left;*/
            padding: 8px;
            text-align: start;
        }
        .header{
            background-color: #dddddd;
        }
        tr:nth-child(even) {
        }
        h3{
            padding-top: 5% ;
            padding-bottom: 5% ;
            text-align: start;
        }
        .row__cell{
            width: 40%;
        }
        body{
            font-family: 'Quantify', sans-serif;
        }
    </style>
</head>
<body >





<div class="wrap">
    <table class="conversion-rate-table">

        <thead class="table__head">
        <tr class="table__headers">
            <td class="header" scope="col">#</td>
            <td class="header" scope="col">الاسم</td>
            <td class="header" scope="col">رقم الجوال</td>
            <td class="header" scope="col">الايميل</td>
            <td class="header" scope="col">نزع الحساب</td>
            <td class="header" scope="col">الحالة</td>
        </tr>
        <tbody class="table__content">

            @foreach($users as $user)

                <tr class="table__row">
                    <td class="" scope="col">{{ $user->id }}</td>
                    <th class="" scope="col">{{$user->name}}</th>
                    <td class="" scope="col">{{ $user->phone }}</td>
                    <td class="" scope="col">{{ $user->email }}</td>
                    <td class="" scope="col">{{ $user->accountTypes->value }}</td>
                    <td class="" scope="col">{{ $user->getStatus() }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
