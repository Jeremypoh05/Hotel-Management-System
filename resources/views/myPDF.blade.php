<html>
<head>
    <title>Booking Invoice</title>
</head>

<style>
.invoice main .notices #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-bottom:0;
    margin-left: 40px;
    font-size:40px;
    text-decoration:none;
    color:black;
    padding-left: 20px;
    margin-left: 20px;
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-to .address{
    max-width:300px;
}

.invoice .invoice-details .invoice-id {
    margin-top: 50px;
    color: #3989c6;
    text-align:center;
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .notices .notice {
    font-size: 17px;
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .table-info th{
    font-size:18px;
    font-weight:bold;
}

.invoice table .table-description td{
    text-align:center;
    font-size:16px;
}

.invoice table .table-description td{
    text-align:center;
    font-size:16px;
}

.invoice table .type {
    background: #ddd;
    font-weight:bold;
}

.invoice table .total {
    font-weight:bold;
    background: #3989c6;
    color: #fff
}


@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }
}
</style>
   
     <div class="invoice overflow-auto">
         <div style="min-width: 600px">
             <header>
                 <div class="row">
                     <div class="col">
                         <img src="">
                     </div>
                     <div class="col company-details">
                         <h2 class="name">                
                             Traders   
                         </h2>
                         <div>Kuala Lumpur City Centre, 50088 KL.</div>
                         <div>+6011 7787888</div>
                     </div>
                 </div>
             </header>
             <main>
         
             <div class="row contacts">
                 <div class="col invoice-to">
                     <div class="text-gray-light">INVOICE TO:</div>
                     <h2 class="to">{{session('data')[0]->full_name}}</h2>
                     <div class="address">{{session('data')[0]->address}}</div>
                     <div class="email">{{session('data')[0]->email}}</div>
                     <div class="number">{{session('data')[0]->mobile}}</div>

                 </div>
                 <div class="col invoice-details">
                     <h1 class="invoice-id">INVOICE</h1>
                    
                 </div>
             </div>
             <table border="0" cellspacing="0" cellpadding="0">
                 <thead>
                     <tr class="table-info">
                         <th class="text-left">Room Type</th>
                         <th class="text-right">Room Name</th>
                         <th class="text-right">Check-In Date</th>
                         <th class="text-right">Check-Out Date</th>
                         <th class="text-right">Price</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr class="table-description">
                     @foreach($booking as $bookings)
                        <td class="type">{{$bookings->roomType}}</td>
                         <td class="text-right">{{$bookings->roomTitle}}<h3></td>
                         <td class="text-right">{{$bookings->checkin_date}}</td>
                         <td class="text-right">{{$bookings->checkout_date}}</td>
                         <td class="text-right">{{$bookings->roomPrice}}</td>
                     @endforeach
                     </tr>
             </table>

             <div class="notices">
                 <div>NOTICE:</div>
                 <div class="notice">The deposit will not return if the contact can not be reached within 3 days.</div>
             </div>
         </main>
         <footer>
             Invoice was created on a computer and is valid without the signature and seal.
         </footer>
     </div>
     <div></div>
 </div>
</div>          
</body>
</html>


