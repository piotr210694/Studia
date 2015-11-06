clc;
clear all;
%1punkt
GR=imread('C:\Users\Piotrek\Downloads\obrazy_lab4\GRACE_K.BMP');
imshow(GR);

%2punkt
GR1=double(GR);

%3punkt
srednia = mean(GR1(:)); 
max = max(GR1(:)); 
min = min(GR1(:)); 
med = median(GR1(:)); 