# Generated by Django 2.2 on 2019-11-04 18:47

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('core', '0005_auto_20191104_1141'),
    ]

    operations = [
        migrations.AlterField(
            model_name='item',
            name='category',
            field=models.CharField(choices=[('Noodles', 'Noodles'), ('Roll', 'Roll'), ('Pizza', 'Pizza'), ('Pasta', 'Pasta'), ('Burger', 'Burger')], max_length=20),
        ),
    ]
