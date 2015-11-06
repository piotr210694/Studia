x=input('Podaj x = ');
if (x>3)
    wynik=x.^2-6;
    disp(wynik);
elseif (x<-1)
    wynik=x.^2-2;
    disp(wynik);
elseif (x>=-1 & x<=3) 
    wynik=x;
    disp(wynik);
end