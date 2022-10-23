#On importe la librairie string
import string
import json
import random
#on g´en`ere l'alphabet en minuscule
alphabet = string.ascii_lowercase
#on g´en`ere l'alphabet en majuscule
ALPHABET = string.ascii_uppercase


def caesar_crypt(msg,decal):
    resStr = ""
    for char in msg:
        if (char == " " or char == "," or char == "."):
            resStr+=char
            continue
        if ord(char) + decal > ord('z'):
            resStr = resStr + chr(ord(char) + decal - 26)
        else:
            resStr = resStr + chr(ord(char) + decal)
    print(resStr)



""" fichier = open("Exercice2_Caesar/freq_lettre_fr.json", "r")

dictionnaire = json.load(fichier)

print(dictionnaire)

fichier.close()
 """


# Exercie 3.3


def string_shuffle(word):
    c = list(word)
    random.shuffle(c)
    return ''.join(c)

def crypt(msg):
    cryptMsg = ""
    for char in msg:
        if (char == " " or char == "," or char == "." or char == "?" or char == "!" or char == ";" or char == ":"):
            cryptMsg += ""
        else:
            cryptMsg += char
    return string_shuffle(cryptMsg).upper()

key = string_shuffle(ALPHABET)
print("Key : " + key)

def chiffre(msg,key):
    chiffreMsg = ""
    for char in msg.upper():
        if (char == " " or char == "," or char == "." or char == "?" or char == "!" or char == ";" or char == ":"):
            chiffreMsg += ""
        else:
            chiffreMsg += key[ord(char)-65]
    return chiffreMsg


print(chiffre("Bonjour ! comment ca va ?",key))

