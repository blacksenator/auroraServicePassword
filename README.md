# Aurora Power One Service Password

Key Generator for Aurora Power One, ABB, FIMER service menu

Mostly useless, but sometimes helpful.
Just in case you need it: the password is checked against the last six digits of the device serial number. Conversely, this means that the password can be derived from the serial number. The basis for this are the last digits of the phone number of the original manufacturer Power One or FIMER: [919510](https://www.youtube.com/watch?v=aOrd-1YLyKk). Depending on whether it is an even or odd position of the digit, the digit of the serial number is added to or subtracted from the digit of the base. Negative values result in an overflow: -1 = 255, -2 = 254 ... Only the unit digit is accepted, which is equal to: y = x + 6. This also applies to values greater than nine: y = x - 10.

## Examples

attribute/operation |value |z5|z4|z3|z2|z1|z0|
--------------------|------|--|--|--|--|--|--|
serial number       |987654| 9| 8| 7| 6| 5| 4|
addition/subtraction|      | +| -| +| -| +| -|
base                |919510| 9| 1| 9| 5| 1| 0|
outcome             |      |18| 7|16| 1| 6| 4|
password            |876164| 8| 7| 6| 1| 6| 4|

attribute/operation |value |z5|z4|z3|z2|z1|z0|
--------------------|------|--|--|--|--|--|--|
serial number       |123456| 1| 2| 3| 4| 5| 6|
addition/subtraction|      | +| -| +| -| +| -|
base                |919510| 9| 1| 9| 5| 1| 0|
outcome             |      |10| 1|12|-1 (255)| 6| 6|
password            |012566| 0| 1| 2| 5| 6| 6|

attribute/operation |value |z5|z4|z3|z2|z1|z0|
--------------------|------|--|--|--|--|--|--|
serial number       |909099| 9| 0| 9| 0| 9| 9|
addition/subtraction|      | +| -| +| -| +| -|
base                |919510| 9| 1| 9| 5|10| 0|
outcome             |      |18|-1 (255)|18|-5 (251)| 0| 9|
password            |858109| 8| 5| 8| 1| 0| 9|

Obvious: the last digit of the password **always** matches that of the serial number!
