##zad3
def silnia(n):
    if n>1:
        return n*silnia(n-1);    #funkcja rekurencyjnie
    elif n in (0,1):
        return 1;
