a=input('Podaj a = ');
b=input('Podaj b = ');
c=input('Podaj c = ');
delta=b^2-4*a*c;

if(delta>0)
    x1=(-b-sqrt(b^2-4*a*c))/2*a;
    x2=(-b+sqrt(b^2-4*a*c))/2*a;  
    disp(x1);
    disp(x2);
elseif(delta == 0)
    x0=(-b/2*a);
    disp(x0);
else
    disp('Brak pierwiastków');
end
    
