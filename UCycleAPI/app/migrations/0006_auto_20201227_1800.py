# Generated by Django 3.1.4 on 2020-12-27 18:00

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0005_auto_20201227_1732'),
    ]

    operations = [
        migrations.RenameField(
            model_name='crew',
            old_name='complains_id',
            new_name='delivering',
        ),
    ]
