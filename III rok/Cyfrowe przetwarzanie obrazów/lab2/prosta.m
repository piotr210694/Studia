function [A, B, C] = prosta(x1,y1,x2,y2)
A=y2-y1;
B=x1-x2;
C=y1.*x2-y2.*x1;

