# -*- encoding: utf-8 -*-
"""
License: MIT
Copyright (c) 2019 - present AppSeed.us
"""

from django.db import models as models
from django.contrib.auth import models as auth_models
from django_extensions.db import fields as extension_fields
from django.urls import reverse
from django.contrib.contenttypes.fields import GenericForeignKey
from django.db.models import BooleanField
from django.db.models import AutoField
from django.db.models import CharField
from django.db.models import DateTimeField
from django.db.models import TextField
from django.db.models import UUIDField
from django.conf import settings
from django.db import models
from django.contrib.contenttypes.models import ContentType
from django.contrib.auth import get_user_model
import uuid
from autoslug import AutoSlugField



class user(models.Model):
    # Fields
    slug = models.AutoField(primary_key=True)
    slug_ref = AutoSlugField(populate_from="slug")
    afm = models.CharField(max_length=30, default=None)
    amka = models.CharField(max_length=30, default=None)
    created = models.DateTimeField(auto_now_add=True, editable=False)
    address = models.CharField(max_length=30, default=None)
    phone = models.CharField(max_length=30, default=None)
    iban = models.CharField(max_length=30, default=None)
    name = models.CharField(max_length=30, default=None)
    mail = models.CharField(max_length=30, default=None)


    class Meta:
        ordering = ('-created',)

    def __unicode__(self):
        return u'%s' % self.slug

    def get_absolute_url(self):
        return reverse('app_complain_detail', args=(self.slug,))


    def get_update_url(self):
        return reverse('app_complain_update', args=(self.slug,))



class retailer(models.Model): #ena mixanima exw apo ena magazi, ta stoixeia na anaferontai sto magazi

    # Fields
    UUID = models.UUIDField(primary_key=True, default=uuid.uuid4, editable=False)
    created = models.DateTimeField(auto_now_add=True, editable=False)
    #last_updated = models.DateTimeField(auto_now=True, editable=False)
    #google_location = models.CharField(max_length=30)
    storename = models.CharField(max_length=30)
    storetype = models.CharField(max_length=30)
    producttype = models.CharField(max_length=30)
    afm = models.CharField(max_length=30)

    class Meta:
        ordering = ('-created',)

    def __unicode__(self):
        return u'%s' % self.pk

    def get_absolute_url(self):
        return reverse('app_infrastructure_detail', args=(self.pk,))


    def get_update_url(self):
        return reverse('app_infrastructure_update', args=(self.pk,))

class material(models.Model):
    # Fields
    UUID = models.UUIDField(primary_key=True, default=uuid.uuid4, editable=False)
    slug_ref = AutoSlugField(populate_from="UUID")
    type = models.CharField(max_length=30)
    buyingprice = models.CharField(max_length=255)
    sellingprice = models.CharField(max_length=255)
    profit = models.CharField(max_length=255)
    created = models.DateTimeField(auto_now_add=True, editable=False)
    weight = models.CharField(max_length=255) # mia posotita pou anaferetai me soxo tin metrisi tou profit px an kati 3x weight tote kai 3x profit

    class Meta:
        ordering = ('-created',)

    def __unicode__(self):
        return u'%s' % self.pk

    def get_absolute_url(self):
        return reverse('app_crew_detail', args=(self.pk,))


    def get_update_url(self):
        return reverse('app_crew_update', args=(self.pk,))



class helpdesk(models.Model):
    # Fields
    slug = models.AutoField(primary_key=True)
    slug_ref = AutoSlugField(populate_from="slug")
    useruuid = models.CharField(max_length=128)
    lastlog = models.DateTimeField(auto_now_add=True, editable=False)

    def __unicode__(self):
        return u'%s' % self.slug

    def get_absolute_url(self):
        return reverse('app_complain_detail', args=(self.slug,))


    def get_update_url(self):
        return reverse('app_complain_update', args=(self.slug,))

class exchange(models.Model):
    # Fields
    slug = models.AutoField(primary_key=True)
    slug_ref = AutoSlugField(populate_from="slug")
    afm = models.CharField(max_length=30, default=None)
    type = models.CharField(max_length=30)
    weight = models.CharField(max_length=255)
    retailerafm = models.CharField(max_length=255)
    profit = models.CharField(max_length=255)
    gave = models.CharField(max_length=255)
    date = models.DateTimeField(auto_now_add=True, editable=False)

    def __unicode__(self):
        return u'%s' % self.slug

    def get_absolute_url(self):
        return reverse('app_complain_detail', args=(self.slug,))


    def get_update_url(self):
        return reverse('app_complain_update', args=(self.slug,))


class loginlogs(models.Model):
    # Fields
    slug = models.AutoField(primary_key=True)
    slug_ref = AutoSlugField(populate_from="slug")
    uuid = models.CharField(max_length=30, default=None)

    def __unicode__(self):
        return u'%s' % self.slug

    def get_absolute_url(self):
        return reverse('app_complain_detail', args=(self.slug,))


    def get_update_url(self):
        return reverse('app_complain_update', args=(self.slug,))
