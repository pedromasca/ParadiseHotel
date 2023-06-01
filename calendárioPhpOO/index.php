<!DOCTYPE html>
<html>
<head>
    <title>Paradise Reservas</title>
    <style>
        /* Estilos CSS para o formulário */
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            width: 200px;
            margin-bottom: 10px;
        }
        input[type="checkbox"] {
            margin-top: 10px;
            margin-right: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Paradise Hotel - Reservas</h1>
    <?php
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $reservation = new HotelReservation();
            $reservation->setCheckInDate($_POST["check_in_date"]);
            $reservation->setCheckOutDate($_POST["check_out_date"]);
            $reservation->setIsBusinessTrip(isset($_POST["business_trip"]));
            $reservation->setNumGuests($_POST["num_guests"]);
            $reservation->setNumChildren($_POST["num_children"]);
            $reservation->setNumPets($_POST["num_pets"]);

            // Chama o método para fazer a reserva
            $reservation->makeReservation();
        }
    ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="check_in_date">Data Check-in:</label>
        <input type="date" name="check_in_date" required><br>

        <label for="check_out_date">Data Check-out:</label>
        <input type="date" name="check_out_date" required><br>
        <br>
        <label for="business_trip">Viagem a Trabalho:</label> 
        <input type="checkbox" name="business_trip">
        <br>
        <label for="num_guests">Hóspedes:</label>
        <select name="num_guests">
            <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select><br>

        <label for="num_children">Menores de 12 anos:</label>
        <select name="num_children">
            <?php
                for ($i = 0; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select><br>

        <label for="num_pets">Pets:</label>
        <select name="num_pets">
            <?php
                for ($i = 0; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
