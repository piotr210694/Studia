##zad1
##print('the answer is %s'%42)
##print('the answer is', str(42))

##zmienna=4.5
##print(int(zmienna)) #do int
##print(float(zmienna)) #do float
##print(str(zmienna)) #do string
##print(complex(zmienna))
##print(chr(int(zmienna)))
##x=4
##print(hex(x))
##print(oct(x))
##nazwa="cos"
##print(tuple(nazwa))
##print(list(nazwa))



##zad2
##amino = {'A':'Ala','C':'Cys','E':'Glu'}
##print("C jest oznaczeniem dla: "+amino['C'])
##print(amino['A'])
##print(amino.items())
##print(amino.keys())
##print(amino.values())
##
##for aa in amino.values():
##    print(aa)

##zbior1 = set(['CP0.1','EF3.1','EF3.1'])
##zbior2 = set(['CP0.2','EF3.1','EF3.2'])
##wynik = zbior1 & zbior2 #czesc wspolna
##print(wynik)
##wynik = zbior1 ^ zbior2 #suma tych, ktore nie sa wspolne
##print(wynik)
##wynik = zbior1 - zbior2 #roznica
##print(wynik)
##wynik = zbior1 | zbior2 #suma
##print(wynik)


##zad3
##def silnia(n):
##    if n>1:
##        return n*silnia(n-1);    #funkcja rekurencyjnie
##    elif n in (0,1):
##        return 1;

##import sil
##n=input("Podaj n = ")
##k=input("Podaj k = ")
##n=int(n)
##k=int(k)
##wynik=sil.silnia(n)/(sil.silnia(k)*sil.silnia(n-k))
##print(wynik)


##zad4
##DNA = "AATGTCCAGTAAACC"
##RNA = ""
##
##zamiana = {'A':'T','T':'U','C':'G','G':'C'} #zamiana
##
##if ((len(DNA) >= 10) & (len(DNA) <=25)): #spr dlugosci lancucha
##    for x in DNA:
##        RNA+=zamiana[x]
##    print("DNA:",DNA)
##    print("RNA:",RNA)
##else:
##    print("Dane nie są prawidłowe")
