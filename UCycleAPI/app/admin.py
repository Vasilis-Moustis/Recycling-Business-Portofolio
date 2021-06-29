# -*- encoding: utf-8 -*-
"""
License: MIT
Copyright (c) 2019 - present AppSeed.us
"""

from django.contrib import admin
from .models import *

# Register your models here.
admin.site.register(user)
admin.site.register(retailer)
admin.site.register(material)
admin.site.register(exchange)
admin.site.register(loginlogs)
