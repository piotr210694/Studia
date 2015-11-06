##zad1
##a=1
##print("Moja liczba to",a)
##print("cos"*3)
##c=input("Podaj liczbe: ")
##print("Twoja liczba to: ", c, ". Super")
##print(13/5)
##print(13 //5)
##print(13 % 5)
##print (3**2)

##student="Jestem studentem"
##rok=input("Ktorego roku?: ")
##kierunek=input("Jaki kierunek?: ")
##print(student,rok,kierunek);


##zad2
##import math
##a=math.floor(1.55678)

##from math import sqrt,floor 
##a=floor(1.55678)
##print(a)
##print(a)
##print(sqrt(125));
##print(floor(32.69))
##print(pow(3,4))


##zad3
##tablica= ["jeden","dwa","trzy","cztery"];
##liczba=input("wybierz liczbe: ");
##ile = int(liczba);
##print("Liczba to: " + tablica[ile-1]);
##print(tablica.index("trzy"))
##print(tablica[1]);
##
##a1='Uniwersytet';
##print("Trzecia litera slowa Uniwersytet to: ", a1[2]);
##
##d1=['Piotr', 'lat 21'];
##d2=['Aleksandrowicz',1994,'Suwałki'];
##d3=[d1,d2];
##print(d3);


##zad4
##tablica="morskie oko";
##print(tablica[4]);
##print(tablica[-4]);
##print(tablica[-5]);
##print(tablica[0:-4]);
##print(tablica[-2:0:-1]);


##zad5
##zbior=['Piotr', 'Andrzej', 'Jan', 'Mateusz'];
##imie = input("Podaj imie: ");
##print(imie in zbior)
        
##del zbior[1]; #usuniecie 2elementu zbioru
##print (zbior);

##a=': :' .join("Bioinformatyka")
##print (a);

##nazwa="Bioinformatyka"
##print(list(nazwa)); #string to list

##zbior2=[1,2,3,4,5]
##print(zbior2)
##zbior2[2:2]=list("pi")
##print("dlugosc listy len to:",len(zbior2))

##zad6
##zb=[3,2,3,4,5]
##dane=['kot','pies','kot','kot','chomik']
##zb.append(10)
##print(zb)
##zb.insert(0,100)
##print(zb)
##zb.pop(2)
##print(zb)
##zb.reverse()
##print(zb)
##zb.index(5)
##print(zb)
##zb.pop()
##print(zb)
##zb.remove(5)
##print(zb)
##dane.count('kot')
##print(zb)

##print(len("Piotr")>len("Aleksanrowicz"))
##print(len("Piotr")<len("Aleksanrowicz"))
##print(len("Piotr")==len("Aleksanrowicz"))
##print(len("Piotr")!=len("Aleksanrowicz"))


##zad7
##x="Piotr"
##y="Aleksandrowicz"
##print(x+" "+y)

##zbior="Uniwersytet w Białymstoku"
##print(zbior.find("Białymstoku"))

##zbior="Uniwersytet w Białymstoku"
##a=zbior.replace("Białymstoku","Warszawie")
##print(a)


##zad9
##x=int(input("Podaj liczbe: "))
##if x>3:
##    print(x,"jest > 3")
##elif (x>=-1 and x<=3):
##    print(x**2)
##else:
##    print(x*x*x)


##zad10
##i=1
##while i<=100:
##    print(i)
##    i=i+1

##for x in range(5):
##    print("Bioinformatyka")


##zad11
##from math import sqrt
##def pierw(a, b, c ):
##    a = int(a)
##    b = int(b)
##    c = int(c)
##    delta = b**-4*a*c
##
##    if delta>0:
##        print("x1 =",(-b-sqrt(b**-4*a*c))/2*a)
##        print("x2 =",(-b+sqrt(b**-4*a*c))/2*a)
##    elif delta==0:
##        print("x0 =",(-b/2*a))
##    else:
##        print("Brak pierwiastków równania")
        

##zad12
##text=open('nowy.txt').read()
##print(text)

##nowy = "Adam Ryś"
##plik = open('nowy.txt','a')
##plik.writelines("\n"+str(nowy))
##plik.close()

##def dodaj(a,b):
##    a = int(a)
##    b= int(b)
##    return(a+b);


