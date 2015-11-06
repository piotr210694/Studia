#Zad5
##slownik = open('aminowaga.txt', 'r')
##a=slownik.read()
##import ast
##slownik2=ast.literal_eval(a)#metoda umożliwiająca zamianę łańcucha na słownik
##wynik=0
##sekwencja="MKTFVLHIFIFALVAF"
##for x in sekwencja:
##    wynik+=slownik2.get(x)
##print("Masa bialka wynosi ",wynik)
##print(wynik-18*(len(sekwencja)-1)) #18 to waga wody która jest między wiązaniami, a wiązań jest o jeden mniej niż liczba tych elementów

##zbior="UUCUCGGACCUGGAGAUUCACAGU" #trzba zliczyc ilosc wystapien danych kombinacji
##print(zbior.count("UCU"))
##print(zbior.count("UCC"))
##print(zbior.count("UCA"))
##print(zbior.count("UCG"))
##print(zbior.count("AGU"))
##print(zbior.count("AGC"))

##ile=0
##zbior="UUC UCG GAC CUG GAG AUU CAC AGU"
##ile=zbior.count("UCU")+zbior.count("UCC")+zbior.count("UCA")+zbior.count("UCG")+zbior.count("AGU")+zbior.count("AGC")
##print(zbior,"\nilosc:",ile)
##
##zbior="U UCU CGG ACC UGG AGA UUC ACA GU"
##ile=zbior.count("UCU")+zbior.count("UCC")+zbior.count("UCA")+zbior.count("UCG")+zbior.count("AGU")+zbior.count("AGC")
##print(zbior,"\nilosc:",ile)
##
##zbior="UU CUC GGA CCU GGA GAU UCA CAG U"
##ile=zbior.count("UCU")+zbior.count("UCC")+zbior.count("UCA")+zbior.count("UCG")+zbior.count("AGU")+zbior.count("AGC")
##print(zbior,"\nilosc:",ile)


#Zad1 b
##def oznaczenie(i):
##    slownik = {"AAT":"N", "AAC":"N", "AAA":"K", "AAG":"K", "ACT":"T", "ACC":"T", "ACA":"T", "ACG":"T", "AGT":"S", "AGC":"S", "AGA":"R", "AGG":"R", "ATT":"I", "ATC":"I", "ATA":"I", "ATG":"M", "CAT":"H", "CAC":"H", "CAA":"Q", "CAG":"Q", "CCT":"P", "CCC":"P", "CCA":"P", "CCG":"P", "CGT":"R", "CGC":"R", "CGA":"R", "CGG":"R", "CTT":"L", "CTC":"L", "CTA":"L", "CTG":"L", "GAT":"D", "GAC":"D", "GAA":"E", "GAG":"E", "GCT":"A", "GCC":"A", "GCA":"A", "GCG":"A", "GGT":"G", "GGC":"G", "GGA":"G", "GGG":"G", "GTT":"V", "GTC":"V", "GTA":"V", "GTG":"V", "TAT":"Y", "TAC":"Y", "TAA":"*", "TAG":"*", "TCT":"S", "TCC":"S", "TCA":"S", "TCG":"S", "TGT":"C", "TGC":"C", "TGA":"*", "TGG":"W", "TTT":"F", "TTC":"F", "TTA":"L", "TTG":"L"}
##    return slownik[i]
##def skrot(i):
##    slownik1 = {"N":"Asn", "K":"Lys", "T":"Thr", "S":"Ser", "R":"Arg", "I":"Ile", "M":"Met", "H":"His", "Q":"Gln", "P":"Pro", "L":"Leu", "D":"Asp", "E":"Glu", "A":"Ala", "G":"Gly", "V":"Val", "Y":"Tyr", "*":"STP", "C":"Cys", "W":"Trp", "F":"Phe"}
##    return slownik1[oznaczenie(i)]
##def pelnaNazwa(i):
##    slownik2 = {"N":"Asparagine", "K":"Lysine", "T":"Threonine", "S":"Serine", "R":"Arginine", "I":"Isoleucine", "M":"Methionine", "H":"Histidine", "Q":"Glutamine", "P":"Proline", "L":"Leucine", "D":"Aspartic acid", "E":"Glutamic acid", "A":"Alanine", "G":"Glycine", "V":"Valine", "Y":"Tyrosine", "*":"STOP", "C":"Cysteine", "W":"Tryptophan", "F":"Phenylalanine"}
##    return slownik2[oznaczenie(i)]
##
##print(oznaczenie("ACG"))
##print(skrot("TGA"))
##print(pelnaNazwa("AAA"))


#zad2
#pary zasad
##dna="ATCGATGATCTTC"
##if len(dna)>=12:
##    ile=dna.count("AT")+dna.count("CG")
##    print(ile)
##else:
##    print("blad")

#transkrypcja na mRNA
##DNA="ATCGATGATCTTC"
##RNA = ""
##zamiana = {'A':'T','T':'U','C':'G','G':'C'} #zamiana
##if ((len(DNA) >= 10) & (len(DNA) <=25)): #spr dlugosci lancucha
##    for x in DNA:
##        RNA+=zamiana[x]
##    print("DNA:",DNA)
##    print("RNA:",RNA)
##else:
##    print("Dane nie są prawidłowe")

#translacja 
##dna="ATCGATGATCTTC"
##dna=dna.split(dna=",")
##print(dna)

#liczebnosc poszczegolnych zasad
##dna="ATCGATGATCTTC"
##print(dna.count("A"))
##print(dna.count("T"))
##print(dna.count("C"))
##print(dna.count("G"))

#zawartość % alaniny i cytozyny
##dna="ATCGATGATCTTC"
##suma=len(dna)
##print("suma =",suma)
##ac=dna.count("A")+dna.count("C")
##wynik=(ac/suma)*100
##print("Zawartość % to:",wynik,"%")

#sekwencja w liste
##dna="ATCGATGATCTTA"
##dna=list(dna)
##print(dna)

#usuwanie guaniny
##dna="ATCGATGATCTTC"
##print(dna)
##dna=dna.replace("G","")
##print(dna)

#odworc liste zasad
##dna="ATCGATGATCTTC"
##dna=list(dna)
##print(dna)
##dna.reverse()
##print(dna)


#zad3
##dna1="ACTGGCCAATTCG"
##dna2="ACGTTTGACAGGTTA"
##if len(dna1)>=10 & len(dna2)>=10:
##    for x in range(10):
##        if dna1.index(x)==dna2.index(x):
##            print(dna1.index(x))
