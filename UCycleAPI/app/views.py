# -*- encoding: utf-8 -*-
"""
Copyright (c) 2019 - present AppSeed.us
"""

from django.contrib.auth.decorators import login_required
from django.shortcuts import render, get_object_or_404, redirect
from django.template import loader
from django.http import HttpResponse
from django import template
from .models import *
import math
import string


#FUNCTIONS FOR GUI
@login_required(login_url="/login/")
def index(request):

    context = {}
    context['segment'] = 'index'

    html_template = loader.get_template( 'index.html' )
    return HttpResponse(html_template.render(context, request))

@login_required(login_url="/login/")
def pages(request):
    context = {}
    # All resource paths end in .html.
    # Pick out the html file name from the url. And load that template.
    try:

        load_template      = request.path.split('/')[-1]
        context['segment'] = load_template

        html_template = loader.get_template( load_template )
        return HttpResponse(html_template.render(context, request))

    except template.TemplateDoesNotExist:

        html_template = loader.get_template( 'page-404.html' )
        return HttpResponse(html_template.render(context, request))

    except:

        html_template = loader.get_template( 'page-500.html' )
        return HttpResponse(html_template.render(context, request))


#FUCTIONS FOR API REQUESTS HANDLING
def returnOptions():
    toreturn = material.objects.all()
    answer = []
    for entry in toreturn:
        answer.append(entry.type)
        answer.append(',')
    return answer

def dbOnCreateResponse(afm, subID, proastio, odos, custloc):
    subUUID = None
    subbed = services.objects.all()
    for entry in subbed:
        if entry.type == subID:
            subUUID = entry.UUID
            #return subUUID
    try:
        subscriptions.objects.create(made_afm = afm, citypart = proastio, subaddress = odos,  google_location = custloc, notes = subID)
        return 'New subscription added on ' + subID
    except Exception as e:
        return e

def giveSubscriptions(userAFM):
    #return userAFM
    userSubs = subscriptions.objects.all().filter(made_afm = userAFM)
    #return userSubs
    answer = ""
    counter = 0
    for entry in userSubs:
        counter += 1
        answer += "Subscription No " + str(entry.slug) + "\nSubbed at " + str(entry.created) + "\nService:  " + str(entry.notes)  + "\nDelivery at:  " + str(entry.subaddress) + "," + str(entry.citypart) + "\n\n"
    if counter > 0:
        return str(answer)
    else:
        return "No subscriptions found with given AFM!"

def crewLogin(theuuid):
    theuuid.replace(' ','')
    crewUUID = list(retailer.objects.all())
    finalUUID = 'retailer object (' + theuuid + ')'
    #return HttpResponse(str(crewUUID))
    if str(finalUUID) in str(crewUUID):
        loginlogs.objects.create(uuid = theuuid)
        loginUUID(theuuid)
        return True
    else:
        return False

def euclidianDistance(x1,x2,y1,y2):
    x = float(sqrt((float(x2)-float(x1)) + (float(y2)-float(y1))**2))
    return x

def smartPath(proastio):
    firstTime = True
    allSubs = subscriptions.objects.all().filter(citypart = proastio)
    delivery_locations = []
    startX, startY = 37.9415179, 23.6506794
    counter = 0
    for entry in allSubs:
        counter += 1
        subscriberLoc = str(entry.google_location).split(',')
        delivery_locations.append([float(subscriberLoc[0]),float(subscriberLoc[1])])
    answer = float(10000000000000000000000.0)
    answerX, answerY = 0.0, 0.0
    done = []
    for k in range(counter):
        answer = float(10000000000000000000000.0)
        for coords in delivery_locations:
            if([coords[0], coords[1]] not in done):
                x = math.pow(startX + float(coords[0]) , 2)
                y = math.pow(startY + float(coords[1]) , 2)
                final = math.pow(x+y , 0.5)
                if final < answer:
                    answer = final
                    answerX, answerY = coords[0], coords[1]
        done.append([startX, startY])
        delivery_locations.remove([answerX, answerY])
        startX, startY = float(answerX), float(answerY)
    done.append([startX, startY])
    bigString = ''
    smallString = ''
    subsriberAddress = ''
    i = 1
    for coords in done:
        if firstTime:
            bigString += "You are at " + str(coords) + "\n"
            firstTime = False
        else:
            smallString = str(float(coords[0])) + "," + str(float(coords[1]))
            #return smallString
            for entry in allSubs:
                #return entry.google_location + "vs" + smallString
                if entry.google_location == smallString:
                    subsriberAddress = entry.subaddress
            bigString += "Stop No " + str(i) + " at " + str(coords) + " on " + str(subsriberAddress) + "\n"
            i += 1
    return bigString

def checkList(proastio):
    firstTime = True
    allSubs = subscriptions.objects.all().filter(citypart = proastio)
    gotinside = []
    delivery_requirements = []
    for entry in allSubs:
        if entry.notes not in gotinside:
            gotinside.append(entry.notes)
            delivery_requirements.append([entry.notes, 1])
        else:
            for delivery in delivery_requirements:
                if delivery[0] == entry.notes:
                    delivery[1] = delivery[1] + 1
    return delivery_requirements

def enviromentalGood(userafm, matweight, material):
    try:
        lastlog = helpdesk.objects.all()
        afm = ""
        for log in lastlog:
            afm = log.useruuid
        exhangedetails = myCalculator(matweight, material)
        exchange.objects.create(afm = userafm, weight = matweight, type = material, retailerafm = afm, profit = exhangedetails[1], gave = exhangedetails[0])
        return "exchange added successfully!"
    except Exception as e:
        return e

def plusOne(username, userafm, useriban, useramka, email, useraddress, userphone):
    userSubs = user.objects.all().filter(afm = userafm)
    answer = ""
    counter = 0
    for entry in userSubs:
        counter += 1
    if counter == 0:
        try:
            user.objects.create(afm = userafm, name = username, amka = useramka, iban = useriban, mail = email, address = useraddress, phone = userphone)
            return "User added successfully!"
        except Exception as e:
            return e
    else:
        return "Registered user found with given AFM!"


def myCalculator(weight, ourmat):
    materials = material.objects.all()
    give = 0
    profit = 0
    for mat in materials:
        if mat.type == ourmat:
            quantity = float(weight) / float(mat.weight)
            give = quantity * float(mat.buyingprice)
            profit = quantity * float(mat.sellingprice)
    result = [str(give), str(profit)]
    return result

def calculation(weight, ourmat):
    materials = material.objects.all()
    profit = 0
    for mat in materials:
        if mat.type == ourmat:
            quantity = float(weight) / float(mat.weight)
            profit = quantity * float(mat.buyingprice)
    result = str(profit)
    return "The selling amount of money for the requested weight of the material " + str(ourmat) + " is: \n" + result[0:4] + " Euros."

def loginUUID(uuid):
    lastlog = helpdesk.objects.all()
    for log in lastlog:
        log.useruuid = uuid
        log.save()
    return

#API REQUEST HANDLER
def index(request):
    #return HttpResponse("Hello")
    if request.method == 'GET':
        type = request.GET.get('action')
        if  type == 'recycled':
            afm = request.GET.get('userafm')
            weight = request.GET.get('weight')
            material = request.GET.get('material')
            return HttpResponse(str(enviromentalGood(afm, weight, material)))
        elif type == 'givemeoptions':
            return HttpResponse(returnOptions())
        elif type == 'iwantintoo':
            afm = request.GET.get('afm')
            name = request.GET.get('name')
            iban = request.GET.get('iban')
            amka = request.GET.get('amka')
            email = request.GET.get('email')
            address = request.GET.get('address')
            phone = request.GET.get('phone')
            return HttpResponse(str(plusOne(name, afm, iban, amka, email, address, phone)))
        elif type == 'calculate':
            weight = request.GET.get('weight')
            material = request.GET.get('material')
            return HttpResponse(str(calculation(weight, material)))
        elif type == 'login':
            theuuid = request.GET.get('uuid')
            if crewLogin(theuuid):
                return HttpResponse("crew")
            else:
                return HttpResponse("notACrew")
        #arg = request.GET.get('uuid', '')
    return HttpResponse("No function selected, sorry...")

#ideas:
"""
-best retailer -users
-option to donate to charity
-option to volunteer to events (this requires an event list)
-adding storename to exchange db
-history of exhanges and total profit per user
-total exchanges as a retailer store, leaderboard
-Sponsoring Websites/Organizations
-Motivational Messages
-Best donators (if donations implemented in the project)

#####-only-if-in-need-#####
Retailer Stores Map
"""
