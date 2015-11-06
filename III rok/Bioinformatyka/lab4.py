#zad1
###!/usr/bin/env python
### -*- coding: utf-8 -*-
##a="Pierwsza %s srodkowa %d i ostatnia %s"
##b=("a",10,"c")
##print(a%b)

##napis="Jestem %s mam %d lat"
##wartosci=("Andrzej", 18)
##print(napis % wartosci )
##
##towar={"A":"adenina","cena":46}
##zdanie="Ser żółty typu: %(A)s-kwota do zaplaty:%(cena)d"
##print(zdanie % towar)

#wlasciwe zadanie
##slownik = {"U":"Uracyl","N":"Asparagine", "K":"Lysine", "T":"Threonine", "S":"Serine", "R":"Arginine", "I":"Isoleucine", "M":"Methionine", "H":"Histidine", "Q":"Glutamine", "P":"Proline", "L":"Leucine", "D":"Aspartic acid", "E":"Glutamic acid", "A":"Alanine", "G":"Glycine", "V":"Valine", "Y":"Tyrosine", "*":"STOP", "C":"Cysteine", "W":"Tryptophan", "F":"Phenylalanine"}
##print("A to: %(A)s" % slownik)
##print("C to: %(C)s" % slownik)
##print("T to: %(T)s" % slownik)
##print("U to: %(U)s" % slownik)
##print("G to: %(G)s" % slownik)


#zad2
##slownik={'TG':{'C':'Cysteina','T':'Cysteina','G':'Tryptofan'}}
##print(slownik['TG']['C'])


#zad3
def oznaczenie(i):
    slownik = {"AAT":"N", "AAC":"N", "AAA":"K", "AAG":"K", "ACT":"T", "ACC":"T", "ACA":"T", "ACG":"T", "AGT":"S", "AGC":"S", "AGA":"R", "AGG":"R", "ATT":"I", "ATC":"I", "ATA":"I", "ATG":"M", "CAT":"H", "CAC":"H", "CAA":"Q", "CAG":"Q", "CCT":"P", "CCC":"P", "CCA":"P", "CCG":"P", "CGT":"R", "CGC":"R", "CGA":"R", "CGG":"R", "CTT":"L", "CTC":"L", "CTA":"L", "CTG":"L", "GAT":"D", "GAC":"D", "GAA":"E", "GAG":"E", "GCT":"A", "GCC":"A", "GCA":"A", "GCG":"A", "GGT":"G", "GGC":"G", "GGA":"G", "GGG":"G", "GTT":"V", "GTC":"V", "GTA":"V", "GTG":"V", "TAT":"Y", "TAC":"Y", "TAA":"*", "TAG":"*", "TCT":"S", "TCC":"S", "TCA":"S", "TCG":"S", "TGT":"C", "TGC":"C", "TGA":"*", "TGG":"W", "TTT":"F", "TTC":"F", "TTA":"L", "TTG":"L"}
    return slownik[i]
def skrot(i):
    slownik1 = {"N":"Asn", "K":"Lys", "T":"Thr", "S":"Ser", "R":"Arg", "I":"Ile", "M":"Met", "H":"His", "Q":"Gln", "P":"Pro", "L":"Leu", "D":"Asp", "E":"Glu", "A":"Ala", "G":"Gly", "V":"Val", "Y":"Tyr", "*":"STP", "C":"Cys", "W":"Trp", "F":"Phe"}
    return slownik1[oznaczenie(i)]
def pelnaNazwa(i):
    slownik2 = {"N":"Asparagine", "K":"Lysine", "T":"Threonine", "S":"Serine", "R":"Arginine", "I":"Isoleucine", "M":"Methionine", "H":"Histidine", "Q":"Glutamine", "P":"Proline", "L":"Leucine", "D":"Aspartic acid", "E":"Glutamic acid", "A":"Alanine", "G":"Glycine", "V":"Valine", "Y":"Tyrosine", "*":"STOP", "C":"Cysteine", "W":"Tryptophan", "F":"Phenylalanine"}
    return slownik2[oznaczenie(i)]

##dna="ACGTATTTGGCCA"
##if len(dna)>11:
##    print
##else:
##    print("blad")
##dna="UUGUCGCGAGGC"
##dna1="UUGUAGCGAGGC"
