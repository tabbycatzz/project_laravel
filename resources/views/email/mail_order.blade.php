<div class="content" style="width: 600px; margin: 0 auto">
    <h2>xin chào {{ $customer->name }} </h2>
    <p>mày đặt hàng chỗ tao</p>
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>SĐT: <strong>{{ $customer->phone }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Khu vực: <strong>{{ $customer->district }}</strong></li>
            <li>Tỉnh (TP): <strong>{{ $customer->city }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->note }}</strong></li>
        </ul>
    </div>
    <div class="carts">
        <table class="table table-hover">
            @php
            $total = 0;
            @endphp
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Hình ảnh sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->carts as $key => $cart)
                @php
                $price = $cart->price * $cart->quantily;
                $total += $price;
                @endphp
                <tr>
                    <th scope="row">{{ $cart->id }}</th>
                    <td>{{ $cart->product->name }}</td>
                    <td>{{ number_format($cart->price) }} đ</td>
                    <td>{{ $cart->quantily }}</td>
                    <td>{{ number_format($price) }} đ</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="text-right">Tổng Tiền: </td>
                    <td>{{ number_format($total) }} đ</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>