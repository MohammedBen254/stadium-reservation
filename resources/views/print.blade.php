<!DOCTYPE html>
<html>
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <title>Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .ticket {
            background: linear-gradient(-45deg, darkblue, aqua);
            padding: 20px;
            border: 1px solid #ccc;
            width: 310px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: green;
        }
        .ticket-info {
            margin-bottom: 20px;
            font-family: "Brush Script MT", cursive;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .ticket-info p {
            margin: 5px 3px;
        }
        #logo {
            float: left;
            margin-right: 10px;
            border-radius: 40%;
            margin-top: 10px;
        }

        .example-card-img-responsive {
            width: 200px;
            height: auto;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="ticket" title="Ticket">
            <img src="{{ asset('stades/image/logo2.png') }}" width="55" title="Logo" alt="Logo" id="logo">
            <p class="text-title fw-bold" title="Stadium Reservation" style="float: left;color: aliceblue;">
                STADIUM <span style="color: aliceblue;">RESERVATION</span>
            </p>
            
            <br>
            <h1>Ticket</h1>

            <div class="ticket-info justify-content-center">
                <table>
                    <tr>
                        <td>
                            <strong>Booking ID</strong>
                        </td>
                        <td style="color: white;">
                            : {{ $booking->id }}
                        </td>   
                    </tr>
                    <tr>
                        <td>
                            <strong>User ID</strong> 
                        </td>
                        <td style="color: white;">
                            : {{ $booking->user_id }} 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Stade ID</strong>
                        </td>
                        <td style="color: white;">
                            : {{ $booking->stade_id }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Stade Name</strong>
                        </td>
                        <td style="color: white;">
                            : {{ $booking->stade_name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Price  </strong>
                        </td>
                        <td style="color: white;">
                            : {{$booking->totalprice}} Dh
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Date  </strong>
                        </td>
                        <td style="color: white;">
                            : {{$booking->date}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>At  </strong>
                        </td>
                        <td style="color: white;">
                            : {{$booking->checkin_time}}
                        </td>
                    </tr>
                </table>
                <br>
                <p class="text-" style="color: white;">Thank you for your visit.</p>
            </div>
        </div>
        
    </div>
</body>
</html>
