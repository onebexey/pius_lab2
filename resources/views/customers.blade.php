<!DOCTYPE html>
<html>
<head>
    <title>!DOCTYPE</title>
    <meta charset="utf-8">
</head>
<body>
    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('allCustomers') }}" method="get">
        <input type="text" name="email" placeholder="Type email">
        <input type="text" name="phone" placeholder="Type phone">
        <input type="text" name="name" placeholder="Type name">
        <select name="blocked" id="blocked">
            <option value="1">блокированные</option>
            <option value="0">доступные</option>
        </select>
        <button>Filter</button>
    </form>
    <div>
        @foreach($customers as $customer)
            <ul>{{ $customer->name }}</ul>
            <ul>{{ $customer->surname }}</ul>
            <ul>{{ $customer->email }}</ul>
            <ul>{{ $customer->phone }}</ul> 
            <ul>{{ $customer->blocked ? 'Заблокирован': 'Доступен'}}</ul>
            <ul><a href="{{ route('detailCustomer', ['id' => $customer->id]) }}">Подробнее</a></ul>
            <div>-----------------------</div>
        @endforeach
    </div>

    {{ $customers->links() }}
</body> 
</html>