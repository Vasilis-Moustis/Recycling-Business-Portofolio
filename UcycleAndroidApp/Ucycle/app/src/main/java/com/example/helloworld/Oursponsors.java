package com.example.helloworld;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

public class Oursponsors extends AppCompatActivity {

    private Button adidas, fno, peugeot, sb, np, pb;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.oursponsors);

        adidas = (Button) findViewById(R.id.adidas);
        adidas.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                partner1();
            }
        });

        fno = (Button) findViewById(R.id.fno);
        fno.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                partner2();
            }
        });

        peugeot = (Button) findViewById(R.id.peugeot);
        peugeot.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                partner4();
            }
        });

        sb = (Button) findViewById(R.id.sb);
        sb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                partner5();
            }
        });

        np = (Button) findViewById(R.id.np);
        np.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                partner3();
            }
        });

        pb = (Button) findViewById(R.id.pb);
        pb.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                mainmenu();
            }
        });

    }

    private void partner1() {
        Intent intent = new Intent(this, partner.class);
        startActivity(intent);
    }

    private void partner2() {
        Intent intent = new Intent(this, partner2.class);
        startActivity(intent);
    }

    private void partner3() {
        Intent intent = new Intent(this, partner3.class);
        startActivity(intent);
    }

    private void partner4() {
        Intent intent = new Intent(this, partner4.class);
        startActivity(intent);
    }

    private void partner5() {
        Intent intent = new Intent(this, partner5.class);
        startActivity(intent);
    }

    public void mainmenu() {
        Intent intent = new Intent(this, MainActivity.class);
        startActivity(intent);
    }

}