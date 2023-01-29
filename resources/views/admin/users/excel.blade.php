<table>
    <thead>
    <tr style="color: red">
        <td>#</td>
    <th >الاسم</th>
    <th >رقم الجوال</th>
    <th >الايميل</th>
    <th>نوع الحساب</th>
    <th>الحالة</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <th>{{$user->name}}</th>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->accountTypes->value }}</td>
            <td>{{ $user->getStatus() }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
