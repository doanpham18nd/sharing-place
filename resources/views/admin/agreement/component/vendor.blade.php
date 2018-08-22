<tr>
    <td>Trụ sở chính :</td>
    <td id="vendor_address">{{ $vendor->address }} - {{ $vendor->prefecture->name }} - {{ $vendor->district->title }} - {{ $vendor->province->title }}</td>
</tr>
<tr>
    <td>Số điện thoại :</td>
    <td id="vendor_phone">0{{ $vendor->vendor_phone }}</td>
</tr>
<tr>
    <td>Email :</td>
    <td id="vendor_email">{{ $vendor->vendor_email }}</td>
</tr>
<tr>
    <td>Tài khoản ngân hàng :</td>
    <td id="vendor_bank">{{ $vendor->vendor_bank }} - Ngân hàng {{ $vendor->bank_name }}</td>
</tr>
