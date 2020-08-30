import time
import requests
from gtts import gTTS as gtts
import os
import playsound
import random
def iot(url):
    response = requests.get(url)
    print(response.text)
    myaud=gtts(text=str(response.text),lang='en-uk',slow=False)
    name=random.randint(1,10000000)
    myaud.save(str(name) +".mp3")
    playsound.playsound(str(name) +".mp3")

def speech(text):
    myaud = gtts(text=text, lang='en-uk', slow=False)
    name = random.randint(1, 10000000)
    myaud.save(str(name) + ".mp3")
    playsound.playsound(str(name) + ".mp3")


print("Welcome to our REVA Mart")
print("Howdy ! Dear Customer...")
print("Choose the products you wish to add to your trolley...")
speech("Welcome to our REVA Mart")
speech("How do you do  ! Dear Customer")
speech("it is advised that you begin the new session to clear the trolley.")
while True:
    speech("scan the barcode : ")
    scanned_item=str(input("scan the barcode : "))
    if scanned_item=="start session":
        #To start a new session.
        #response=requests.get("http://localhost/barcode/control_session.php?operation=1")
        #print(response.text)
        iot("http://localhost/barcode/control_session.php?operation=1")
        speech("Welcome to our REVA Mart")
        speech("Choose the products you may wish to add to your trolley")
        speech("scan on add mode to add , and delete mode to remove the product from the trolley")

    if scanned_item=="end session":
        #To end the session and proceed to the payment.
        #response=requests.get("http://localhost/barcode/control_session.php?operation=2")
        #print(response.text)
        iot("http://localhost/barcode/control_session.php?operation=2")

    if scanned_item=="mode : add":
        speech("scan the product to add")
        while 1:
            scanned_item=str(input("scan the product to add : "))
            if scanned_item=='mode : del':
                break
            if scanned_item == 'end session':
                #response = requests.get("http://localhost/barcode/control_session.php?operation=2")
                #print(response.text)
                iot("http://localhost/barcode/control_session.php?operation=2")
                break
            if scanned_item == 'start session':
                #response = requests.get("http://localhost/barcode/control_session.php?operation=1")
                #print(response.text)
                iot("http://localhost/barcode/control_session.php?operation=1")
                break


            #response=requests.get("http://localhost/barcode/control_items.php?barcode="+scanned_item+"&operation=1")
            #print(response.text)
            iot("http://localhost/barcode/control_items.php?barcode="+scanned_item+"&operation=1")


    if scanned_item=="mode : del":
        speech('scan the product to remove ')
        scanned_item=input('scan the product to remove : ')
        if scanned_item == 'mode : add':
            break
        if scanned_item == 'end session':
            #response = requests.get("http://localhost/barcode/control_session.php?operation=2")
            #print(response.text)
            iot("http://localhost/barcode/control_session.php?operation=2")
            break
        if scanned_item == 'start session':
            #response = requests.get("http://localhost/barcode/control_session.php?operation=1")
            #print(response.text)
            iot("http://localhost/barcode/control_session.php?operation=1")
            break


        #response = requests.get("http://localhost/barcode/control_items.php?barcode=" + scanned_item + "&operation=2")
        #print(response.text)
        iot("http://localhost/barcode/control_items.php?barcode=" + scanned_item + "&operation=2")

