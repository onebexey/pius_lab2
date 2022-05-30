<!DOCTYPE html>
<html>
<head>
    <title>!DOCTYPE</title>
    <meta charset="utf-8">
</head>
<body>
    <div>
        <ul>{{ $customer->name }}</ul>
        <ul>{{ $customer->surname }}</ul>
        <ul>{{ $customer->email }}</ul>
        <ul>{{ $customer->phone }}</ul> 
        <ul>{{ $customer->blocked ? 'Заблокирован': 'Доступен'}}</ul>
    </div>
    <div>
        <h1>Adresses: </h1>
        @foreach($customer->adresses as $adress)
            <h3>{{$adress->adress_by_customer ?? $adress->city . ', ' . $adress->street . ', ' . $adress->house}}</h3>
            <h5>{{ 'Date: ' . $adress->created_at}}</h5>
            <div>-----------------------------</div>
        @endforeach
    </div>
</body> 
</html>