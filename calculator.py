#----------------------------------Calculator App in python--------------------------
#fuction create
def addition(num1,num2):
    result = (num1)+(num2) 
    #print("{0}+{1}={2}".format(num1,num2,result)) #num1-value+num2-value=result
    print(f"{(num1)}+{(num2)}={result}")
    
    
    
def substraction(num1,num2):
    result = num1-num2 
    print("{0}-{1}={2}".format(num1,num2,result)) #num1-value+num2-value=result
    
def multiplication(num1,num2):
    result = num1*num2 
    print("{0}*{1}={2}".format(num1,num2,result)) #num1-value+num2-value=result
    
def division(num1,num2):
    if num2==0.0:
        print("can not do divide by zero")
    else:
        result = num1/num2 
    print("{0}/{1}={2}".format(num1,num2,result)) #num1-value+num2-value=result
    

    
#display
print("What do you want to do?")
print("1 for addition")
print("2 for subtraction")
print("3 for multiplication")
print("4 for division")

#user input-2 digit number
choice=input("Enter your choice:")

#taking two number as a inoput
num1=float(input("Enter number one:"))
num2=float(input("Enter number two:"))

#condition
if choice=='1':
    addition(num1,num2)
elif choice=='2':
    substraction(num1,num2)
elif choice=='3':
    multiplication(num1,num2)
elif choice=='4':
    division(num1,num2)
else:
    print("Invalid choice")


